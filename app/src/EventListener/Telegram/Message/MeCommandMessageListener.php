<?php

declare(strict_types=1);

namespace App\EventListener\Telegram\Message;

use App\Contracts\HttpClient\Telegram\BotApi;
use App\Event\Telegram\MessageEvent;
use Core\Telegram\Message\Entity\Message;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Twig;

final class MeCommandMessageListener extends AbstractMessageListener
{
    public function __construct(
        private readonly BotApi $telegram,
        private readonly Twig\Environment $twig,
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
     * @throws \JsonException
     */
    public function onMessage(MessageEvent $event): void
    {
        $message = $event->getMessage();

        if ($message->text?->getValue() !== '/me') {
            return;
        }

        $event->stopPropagation();

        $this->telegram->sendMessage(
            chatId: $message->chat->id,
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
    }
}
