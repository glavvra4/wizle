<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity\PollOption;

use Core\Common\Entity\IntValueObject;
use Core\Telegram\Poll\Entity\PollOption\Exception\InvalidVoterCountException;

class VoterCount extends IntValueObject
{
    public function __construct(int $value)
    {
        parent::__construct($value);

        if ($value < 0) {
            throw new InvalidVoterCountException(
                sprintf("Poll option Voter count must be a positive number, %d given", $value),
                0,
                $this
            );
        }
    }
}
