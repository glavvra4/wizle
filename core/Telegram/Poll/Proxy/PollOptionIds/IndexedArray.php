<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Proxy\PollOptionIds;

use Core\Telegram\Poll\Entity\PollOption;
use Core\Telegram\Poll\Entity\PollOptionIds;
use InvalidArgumentException;

class IndexedArray extends PollOptionIds
{
    /**
     * @param array<int> $data
     */
    public function __construct(array $data)
    {
        $entities = [];
        foreach ($data as $datum) {
            if (!is_int($datum)) {
                throw new InvalidArgumentException("Each element of \"data\" array must be an integer");
            }

            $entities[] = new PollOption\Id($datum);
        }

        parent::__construct($entities);
    }
}
