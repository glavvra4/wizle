<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Proxy\MessageEntities;

use Core\Telegram\Message\Entity\MessageEntities;
use Core\Telegram\Message\Proxy\MessageEntity\AssociativeArray as MessageEntityAssociativeArrayProxy;
use InvalidArgumentException;

class IndexedArray extends MessageEntities
{
    /**
     * @param array<array> $data
     */
    public function __construct(array $data)
    {
        $entities = [];
        foreach ($data as $datum) {
            if (!is_array($datum)) {
                throw new InvalidArgumentException("Each element of \"data\" array must be an array");
            }

            $entities[] = new MessageEntityAssociativeArrayProxy($datum);
        }

        parent::__construct($entities);
    }
}
