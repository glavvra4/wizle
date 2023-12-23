<?php

declare(strict_types=1);

namespace App\EventListener\Telegram\Update;

use App\Event\Telegram\MessageEvent;
use App\Event\Telegram\UpdateEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

final class MessageUpdateListener extends AbstractUpdateListener
{
    public function __construct(
        private readonly EventDispatcherInterface $eventDispatcher
    )
    {
    }

    public function onUpdate(UpdateEvent $event): void
    {
        $update = $event->getUpdate();

        if ($update->message === null) {
            return;
        }

        $this->eventDispatcher->dispatch(new MessageEvent($update->message), MessageEvent::NAME);

        $event->stopPropagation();
    }
}
