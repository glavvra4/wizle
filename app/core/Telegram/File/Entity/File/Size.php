<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity\File;

use Core\Common\Entity\IntValueObject;
use Core\Telegram\File\Entity\File\Exception\InvalidSizeException;

class Size extends IntValueObject
{
    /**
     * @param int $value Positive number
     *
     * @throws InvalidSizeException if value is lower than 0
     */
    public function __construct(int $value)
    {
        parent::__construct($value);

        if ($value < 0) {
            throw new InvalidSizeException(
                sprintf("File size must be a positive number, %d given", $value),
                0,
                $this
            );
        }
    }
}
