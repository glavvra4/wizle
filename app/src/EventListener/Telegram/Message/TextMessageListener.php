<?php

declare(strict_types=1);

namespace App\EventListener\Telegram\Message;

use App\Contracts\HttpClient\Telegram\BotApi;
use App\Event\Telegram\MessageEvent;
use Core\Telegram\Message\Entity\Message;
use JsonException;
use Symfony\Component\RateLimiter\RateLimiterFactory;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

final class TextMessageListener extends AbstractMessageListener
{
    public function __construct(
        private readonly BotApi $telegram,
        private readonly RateLimiterFactory $telegramAnonymousMessagesLimiter,
        private readonly Twig\Environment $twig
    )
    {
    }

    /**
     * @param MessageEvent $event
     *
     * @return void
     *
     * @throws Twig\Error\Error
     * @throws ExceptionInterface
     * @throws JsonException
     */
    public function onMessage(MessageEvent $event): void
    {
        $message = $event->getMessage();

        if ($message->text === null) {
            return;
        }

        $event->stopPropagation();

        $limiter = $this->telegramAnonymousMessagesLimiter->create((string)$message->chat->id->getValue());
        $limit = $limiter->consume();
        if (!$limit->isAccepted()) {
            $this->telegram->sendMessage(
                chatId: $message->chat->id,
                text: new Message\Text(
                    $this->twig->render(
                        name: 'Telegram/Message/questionsLimitReached.html.twig'
                    )
                )
            );
            return;
        }

        $this->telegram->sendAdminMessage(
            text: new Message\Text(
                $this->twig->render(
                    name: 'Telegram/Message/senderInfo.html.twig',
                    context: [
                        'senderId' => $message->from?->id->getValue(),
                        'senderFirstName' => $message->from?->firstName->getValue(),
                        'senderLastName' => $message->from?->lastName?->getValue(),
                        'senderUsername' => $message->from?->username?->getValue(),
                    ]
                )
            )
        );

        $this->telegram->sendAdminMessage(
            text: new Message\Text(
                $this->twig->render(
                    name: 'Telegram/Message/newAnonymousQuestion.html.twig',
                    context: [
                        'questionText' => $message->text->getValue()
                    ]
                )
            )
        );

        $this->telegram->sendMessage(
            chatId: $message->chat->id,
            text: new Message\Text(
                $this->twig->render(
                    name: 'Telegram/Message/questionWasSuccessfullySubmitted.html.twig',
                    context: [
                        'questionsCountRemaining' => $limit->getRemainingTokens()
                    ]
                )
            )
        );
    }
}
