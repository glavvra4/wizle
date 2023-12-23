<?php

declare(strict_types=1);

namespace App\EventListener\Telegram\Update;

use App\Event\Telegram\UpdateEvent;

abstract class AbstractUpdateListener
{
    abstract public function onUpdate(UpdateEvent $event): void;
}
