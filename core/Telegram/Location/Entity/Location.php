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
        protected Location\Longitude $longitude,
        protected Location\Latitude $latitude,
        protected ?Location\HorizontalAccuracy $horizontalAccuracy = null,
        protected ?Location\LivePeriod $livePeriod = null,
        protected ?Location\Heading $heading = null,
        protected ?Location\ProximityAlertRadius $proximityAlertRadius = null,
    )
    {
    }

    /**
     * @return Location\Longitude
     */
    public function getLongitude(): Location\Longitude
    {
        return $this->longitude;
    }

    /**
     * @return Location\Latitude
     */
    public function getLatitude(): Location\Latitude
    {
        return $this->latitude;
    }

    /**
     * @return Location\HorizontalAccuracy|null
     */
    public function getHorizontalAccuracy(): ?Location\HorizontalAccuracy
    {
        return $this->horizontalAccuracy;
    }

    /**
     * @return Location\LivePeriod|null
     */
    public function getLivePeriod(): ?Location\LivePeriod
    {
        return $this->livePeriod;
    }

    /**
     * @return Location\Heading|null
     */
    public function getHeading(): ?Location\Heading
    {
        return $this->heading;
    }

    /**
     * @return Location\ProximityAlertRadius|null
     */
    public function getProximityAlertRadius(): ?Location\ProximityAlertRadius
    {
        return $this->proximityAlertRadius;
    }
}
