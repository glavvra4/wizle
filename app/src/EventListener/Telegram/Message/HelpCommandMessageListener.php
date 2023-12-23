<?php

declare(strict_types=1);

namespace App\EventListener\Telegram\Message;

use App\Contracts\HttpClient\Telegram\BotApi;
use App\Event\Telegram\MessageEvent;
use Core\Telegram\Message\Entity\Message;

final class HelpCommandMessageListener extends AbstractMessageListener
{
    public function __construct(
        private readonly BotApi $telegram
    )
    {
    }

    public function onMessage(MessageEvent $event): void
    {
        $message = $event->getMessage();

        if ($message->text?->getValue() !== '/help') {
            return;
        }

        $event->stopPropagation();

        $this->telegram->sendMessage(
            chatId: $message->chat->id,
            text: new Message\Text(<<<HTML
На данный момент бот поддерживает только текстовые сообщения. Фотографии, видео, гифки, стикеры и прочее - не обрабатываются. Просто отправь любой текст боту, и я увижу твой вопрос.
HTML)
        );
    }
}
