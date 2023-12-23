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

final class MediaGroupMessageListener extends AbstractMessageListener
{
    public function __construct(
        private readonly BotApi $telegram,
        private readonly Twig\Environment $twig,
        private readonly RateLimiterFactory $telegramMediaGroupLimiter,
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

        if ($message->mediaGroupId === null) {
            return;
        }

        $event->stopPropagation();

        $limiter = $this->telegramMediaGroupLimiter->create($message->mediaGroupId->getValue());
        $limit = $limiter->consume();

        if (false === $limit->isAccepted()) {
            return;
        }

        $this->telegram->sendMessage(
            chatId: $message->chat->id,
            text: new Message\Text(
                $this->twig->render(
                    name: 'Telegram/Message/mediaGroupForbidden.html.twig'
                )
            )
        );
    }
}
