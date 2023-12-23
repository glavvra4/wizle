<?php

declare(strict_types=1);

namespace App\EventListener\Telegram\Message;

use App\Contracts\HttpClient\Telegram\BotApi;
use App\Event\Telegram\MessageEvent;
use Core\Telegram\Message\Entity\Message;
use Masterminds\HTML5;
use Symfony\Component\RateLimiter\RateLimiterFactory;

final class TextMessageListener extends AbstractMessageListener
{
    public function __construct(
        private readonly BotApi $telegram,
        private readonly RateLimiterFactory $anonymousMessagesLimiter
    )
    {
    }

    public function onMessage(MessageEvent $event): void
    {
        $message = $event->getMessage();

        if ($message->text === null) {
            return;
        }

        $event->stopPropagation();

        $limiter = $this->anonymousMessagesLimiter->create((string)$message->chat->id->getValue());
        $limit = $limiter->consume();
        if (!$limit->isAccepted()) {
            $this->telegram->sendMessage(
                chatId: $message->chat->id,
                text: new Message\Text(<<<HTML
Достигнут лимит вопросов на сегодня. Попробуйте позже.
HTML)
            );
            return;
        }

        $this->telegram->sendAdminMessage(
            text: new Message\Text(
                sprintf(<<<HTML
id отправителя: %s
Имя: %s
Фамилия: %s
Имя пользователя: @%s
HTML,
                    $message->from?->id->getValue(),
                    $message->from?->firstName->getValue(),
                    $message->from?->lastName?->getValue(),
                    $message->from?->username?->getValue(),
                )
            )
        );

        $this->telegram->sendAdminMessage(
            text: new Message\Text(sprintf(<<<HTML
Новый вопрос!

%s
HTML,
                $message->text->getValue()))
        );

        $this->telegram->sendMessage(
            chatId: $message->chat->id,
            text: new Message\Text(sprintf(<<<HTML
Ваш вопрос успешно отправлен!

Осталось вопросов сегодня: %d
HTML, $limit->getRemainingTokens()))
        );
    }
}
