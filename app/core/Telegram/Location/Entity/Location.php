<?php

declare(strict_types=1);

namespace Core\Telegram\Location\Entity;

class Location implements LocationInterface
{
    /**
     * @param Location\Longitude $longitude
     * @param Location\Latitude $latitude
     * @param Location\HorizontalAccuracy|null $horizontalAccuracy
     * @param Location\LivePeriod|null $livePeriod
     * @param Location\Heading|null $heading
     * @param Location\ProximityAlertRadius|null $proximityAlertRadius
     */
    public function __construct(
        public readonly Location\Longitude             $longitude,
        public readonly Location\Latitude              $latitude,
        public readonly ?Location\HorizontalAccuracy   $horizontalAccuracy = null,
        public readonly ?Location\LivePeriod           $livePeriod = null,
        public readonly ?Location\Heading              $heading = null,
        public readonly ?Location\ProximityAlertRadius $proximityAlertRadius = null,
    )
    {
    }
}
