<?php

declare(strict_types=1);

namespace Core\Telegram\Location\Entity\Location;

use Core\Common\Entity\IntValueObject;
use Core\Telegram\Location\Entity\Location\Exception\InvalidHeadingException;

class Heading extends IntValueObject
{
    /**
     * @param int $value number between 1 and 360, in degrees
     *
     * @throws InvalidHeadingException if value is lower than 1 or is greater than 360
     */
    public function __construct(int $value)
    {
        parent::__construct($value);

        if ($value < 1 || $value > 360) {
            throw new InvalidHeadingException(
                sprintf("Location Heading must be a number between 1 and 360, %d given", $value),
                0,
                $this
            );
        }
    }
}
