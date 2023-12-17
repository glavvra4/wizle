<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity\MessageEntity;

use Core\Common\Entity\IntValueObject;
use Core\Telegram\Message\Entity\MessageEntity\Exception\InvalidLengthException;

class Length extends IntValueObject
{
    public function __construct(int $value)
    {
        parent::__construct($value);

        if ($value < 0) {
            throw new InvalidLengthException(
                sprintf("Message entity Length must be a positive number, %d given", $value),
                0,
                $this
            );
        }
    }
}
