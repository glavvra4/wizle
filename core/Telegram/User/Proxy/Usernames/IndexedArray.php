<?php

declare(strict_types=1);

namespace Core\Telegram\User\Proxy\Usernames;

use Core\Telegram\User\Entity\User\Username;
use Core\Telegram\User\Entity\Usernames;
use InvalidArgumentException;

class IndexedArray extends Usernames
{
    /**
     * @param array<string> $data
     */
    public function __construct(array $data)
    {
        $entities = [];
        foreach ($data as $datum) {
            if (!is_string($datum)) {
                throw new InvalidArgumentException("Each element of \"data\" array must be a string");
            }

            $entities[] = new Username($datum);
        }

        parent::__construct($entities);
    }
}
