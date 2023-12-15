<?php

declare(strict_types=1);

namespace Core\Telegram\Location\Entity\Location;

use Core\Common\Entity\FloatValueObject;
use Core\Telegram\Location\Entity\Location\Exception\InvalidHorizontalAccuracyException;

class HorizontalAccuracy extends FloatValueObject
{
    /**
     * @param float $value Number between 0 and 1500
     *
     * @throws InvalidHorizontalAccuracyException if value is lower than 0 or is greater than 1500
     */
    public function __construct(float $value)
    {
        parent::__construct($value);

        if ($value < 0 || $value > 1500) {
            throw new InvalidHorizontalAccuracyException(
                sprintf("Location Horizontal Accuracy value must be a float number between 0 and 1500, %F given", $value),
                0,
                $this
            );
        }
    }
}
