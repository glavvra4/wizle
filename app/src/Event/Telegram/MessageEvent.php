<?php

declare(strict_types=1);

namespace App\Event\Telegram;

use Core\Telegram\Message\Entity\Message;
use Symfony\Contracts\EventDispatcher\Event;

class MessageEvent extends Event
{
    /**
     * @Event("App\Event\Telegram\MessageEvent")
     *
     * @var string
     */
    public const NAME = 'app.telegram.message';

    public function __construct(
        protected Message $message
    )
    {
    }

    /**
     * @return Message
     */
    public function getMessage(): Message
    {
        return $this->message;
    }
}
