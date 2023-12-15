<?php

declare(strict_types=1);

namespace Core\Telegram\Location\Adapter\Location;

use Core\Common\Adapter\BaseAssociativeArray;
use Core\Telegram\Location\Entity\Location;
use Core\Telegram\Location\Entity\LocationInterface;
use DateInterval;
use Exception;

class AssociativeArray extends BaseAssociativeArray implements LocationInterface
{
    protected Location $location;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'longitude' => 'double',
            'latitude' => 'double',
            'horizontal_accuracy' => 'double',
            'live_period' => 'integer',
            'heading' => 'integer',
            'proximity_alert_radius' => 'integer'
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMandatoryFields(): array
    {
        return [
            'latitude',
            'longitude'
        ];
    }

    /**
     * @param array{longitude: float, latitude: float, horizontal_accuracy: float, live_period: int, heading: int, proximity_alert_radius: int} $data
     *
     * @throws Location\Exception\InvalidLongitudeException if longitude is lower than -180 or is greater than 180
     * @throws Location\Exception\InvalidLatitudeException if latitude is lower than -90 or is greater than 90
     * @throws Location\Exception\InvalidHorizontalAccuracyException if horizontal_accuracy is lower than 0 or is greater than 1500
     * @throws Location\Exception\InvalidHeadingException if heading is lower than 1 or is greater than 360
     * @throws Location\Exception\InvalidProximityAlertRadiusException if proximity_alert_radius is negative
     * @throws Exception if invalid DateInterval data given
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->location = new Location(
            new Location\Longitude($data['longitude']),
            new Location\Latitude($data['latitude']),
            (array_key_exists('horizontal_accuracy', $data) && $data['horizontal_accuracy'] !== null)
                ? new Location\HorizontalAccuracy($data['horizontal_accuracy'])
                : null,
            (array_key_exists('live_period', $data) && $data['live_period'] !== null)
                ? new Location\LivePeriod(new DateInterval('PT'.$data['live_period'].'S'))
                : null,
            (array_key_exists('heading', $data) && $data['heading'] !== null)
                ? new Location\Heading($data['heading'])
                : null,
            (array_key_exists('proximity_alert_radius', $data) && $data['proximity_alert_radius'] !== null)
                ? new Location\ProximityAlertRadius($data['proximity_alert_radius'])
                : null,
        );
    }

    public function getLongitude(): Location\Longitude
    {
        return $this->location->getLongitude();
    }

    public function getLatitude(): Location\Latitude
    {
        return $this->location->getLatitude();
    }

    public function getHorizontalAccuracy(): ?Location\HorizontalAccuracy
    {
        return $this->location->getHorizontalAccuracy();
    }

    public function getLivePeriod(): ?Location\LivePeriod
    {
        return $this->location->getLivePeriod();
    }

    public function getHeading(): ?Location\Heading
    {
        return $this->location->getHeading();
    }

    public function getProximityAlertRadius(): ?Location\ProximityAlertRadius
    {
        return $this->location->getProximityAlertRadius();
    }
}
