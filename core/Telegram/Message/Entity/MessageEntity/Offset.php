<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity\MessageEntity;

use Core\Common\Entity\IntValueObject;
use Core\Telegram\Message\Entity\MessageEntity\Exception\InvalidOffsetException;

class Offset extends IntValueObject
{
    public function __construct(int $value)
    {
        parent::__construct($value);

        if ($value < 0) {
            throw new InvalidOffsetException(
                sprintf("Message entity Offset must be a positive number, %d given", $value),
                0,
                $this
            );
        }
    }
}
