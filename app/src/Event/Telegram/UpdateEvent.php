<?php

declare(strict_types=1);

namespace App\Event\Telegram;

use Core\Telegram\Update\Entity\Update;
use Symfony\Contracts\EventDispatcher\Event;

class UpdateEvent extends Event
{
    public const NAME = 'telegram.update';

    public function __construct(
        protected Update $update
    )
    {
    }

    /**
     * @return Update
     */
    public function getUpdate(): Update
    {
        return $this->update;
    }
}
