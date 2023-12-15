<?php

declare(strict_types=1);

namespace Core\Telegram\Location\Entity\Location;

use Core\Common\Entity\FloatValueObject;
use Core\Telegram\Location\Entity\Location\Exception\InvalidLatitudeException;

class Latitude extends FloatValueObject
{
    /**
     * @param float $value Number between -90 and 90
     *
     * @throws InvalidLatitudeException if value is lower than -90 or is greater than 90
     */
    public function __construct(float $value)
    {
        parent::__construct($value);

        if ($value < -90 || $value > 90) {
            throw new InvalidLatitudeException(
                sprintf("Location Latitude value must be a float number between -90 and 90, %F given", $value),
                0,
                $this
            );
        }
    }
}
