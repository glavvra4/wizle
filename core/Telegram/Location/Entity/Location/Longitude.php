<?php

declare(strict_types=1);

namespace Core\Telegram\Location\Entity\Location;

use Core\Common\Entity\FloatValueObject;
use Core\Telegram\Location\Entity\Location\Exception\InvalidLongitudeException;

class Longitude extends FloatValueObject
{
    /**
     * @param float $value Number between -180 and 180
     *
     * @throws InvalidLongitudeException if value is lower than -180 or is greater than 180
     */
    public function __construct(float $value)
    {
        parent::__construct($value);

        if ($value < -180 || $value > 180) {
            throw new InvalidLongitudeException(
                sprintf("Location Longitude value must be a float number between -180 and 180, %F given", $value),
                0,
                $this
            );
        }
    }
}
