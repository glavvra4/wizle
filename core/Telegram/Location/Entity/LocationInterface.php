<?php

declare(strict_types=1);

namespace Core\Telegram\Location\Entity;

interface LocationInterface
{
    /**
     * @return Location\Longitude
     */
    public function getLongitude(): Location\Longitude;

    /**
     * @return Location\Latitude
     */
    public function getLatitude(): Location\Latitude;

    /**
     * @return Location\HorizontalAccuracy|null
     */
    public function getHorizontalAccuracy(): ?Location\HorizontalAccuracy;

    /**
     * @return Location\LivePeriod|null
     */
    public function getLivePeriod(): ?Location\LivePeriod;

    /**
     * @return Location\Heading|null
     */
    public function getHeading(): ?Location\Heading;

    /**
     * @return Location\ProximityAlertRadius|null
     */
    public function getProximityAlertRadius(): ?Location\ProximityAlertRadius;
}
