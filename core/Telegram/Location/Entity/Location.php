<?php

declare(strict_types=1);

namespace Core\Telegram\Location\Entity;

readonly class Location implements LocationInterface
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
        public Location\Longitude             $longitude,
        public Location\Latitude              $latitude,
        public ?Location\HorizontalAccuracy   $horizontalAccuracy = null,
        public ?Location\LivePeriod           $livePeriod = null,
        public ?Location\Heading              $heading = null,
        public ?Location\ProximityAlertRadius $proximityAlertRadius = null,
    )
    {
    }
}
