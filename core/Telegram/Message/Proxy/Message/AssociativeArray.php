<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Proxy\Message;

use Core\Telegram\Chat\Proxy\Chat\AssociativeArray as ChatAssociativeArrayProxy;
use Core\Telegram\Message\Entity\Message;

readonly class AssociativeArray extends Message
{
    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct(
            new Message\Id($data['message_id']),
            new Message\Date($data['date']),
            new ChatAssociativeArrayProxy($data['chat']),
        );
    }
}
