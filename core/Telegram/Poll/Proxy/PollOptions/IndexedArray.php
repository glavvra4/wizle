<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Proxy\PollOptions;

use Core\Telegram\Poll\Entity\PollOptions;
use Core\Telegram\Poll\Proxy\PollOption\AssociativeArray as PollOptionAssociativeArrayProxy;
use InvalidArgumentException;

class IndexedArray extends PollOptions
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

            $entities[] = new PollOptionAssociativeArrayProxy($datum);
        }

        parent::__construct($entities);
    }
}
