<?php

declare(strict_types=1);

namespace Core\Telegram\Location\Entity\Location;

use Core\Common\Entity\IntValueObject;
use Core\Telegram\Location\Entity\Location\Exception\InvalidProximityAlertRadiusException;

class ProximityAlertRadius extends IntValueObject
{
    /**
     * @param int $value Positive number
     *
     * @throws InvalidProximityAlertRadiusException if value is negative
     */
    public function __construct(int $value)
    {
        parent::__construct($value);

        if ($value < 0) {
            throw new InvalidProximityAlertRadiusException(
                sprintf("Location Proximity Alert Radius value must be a positive number, %d given", $value),
                0,
                $this
            );
        }
    }
}
