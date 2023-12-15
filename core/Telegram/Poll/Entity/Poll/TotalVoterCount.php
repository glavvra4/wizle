<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity\Poll;

use Core\Common\Entity\IntValueObject;
use Core\Telegram\Poll\Entity\Poll\Exception\InvalidTotalVoterCountException;

class TotalVoterCount extends IntValueObject
{
    public function __construct(int $value)
    {
        parent::__construct($value);

        if ($value < 0) {
            throw new InvalidTotalVoterCountException(
                sprintf("Poll Total voter count must be a positive number, %d given", $value),
                0,
                $this
            );
        }
    }
}
