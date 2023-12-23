<?php

declare(strict_types=1);

namespace App\EventListener\Telegram\Message;

use App\Contracts\HttpClient\Telegram\BotApi;
use App\Event\Telegram\MessageEvent;
use Core\Telegram\Message\Entity\Message;

final class DefaultMessageListener extends AbstractMessageListener
{
    public function __construct(
        private readonly BotApi $telegram
    )
    {
    }

    public function onMessage(MessageEvent $event): void
    {
        $message = $event->getMessage();

        $event->stopPropagation();

        $this->telegram->sendMessage(
            chatId: $message->chat->id,
            text: new Message\Text('Неподдерживаемый тип сообщения. Для доступа к возможным командам нажмите /help')
        );
    }
}
