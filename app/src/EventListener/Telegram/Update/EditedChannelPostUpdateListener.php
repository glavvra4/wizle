<?php

declare(strict_types=1);

namespace App\EventListener\Telegram\Update;

use App\Event\Telegram\UpdateEvent;

final class EditedChannelPostUpdateListener extends AbstractUpdateListener
{
    public function onUpdate(UpdateEvent $event): void
    {
        $update = $event->getUpdate();

        if ($update->editedChannelPost === null) {
            return;
        }

        $event->stopPropagation();
    }
}
