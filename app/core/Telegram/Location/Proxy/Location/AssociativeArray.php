<?php

declare(strict_types=1);

namespace Core\Telegram\Location\Proxy\Location;

use Core\Telegram\Location\Entity\Location;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends Location
{
    public function __construct(
        #[ArrayShape([
            'longitude' => 'float',
            'latitude' => 'float',
            'horizontal_accuracy' => 'float',
            'live_period' => 'int',
            'heading' => 'int',
            'proximity_alert_radius' => 'int'
        ])] array $data
    )
    {
        parent::__construct(
            new Location\Longitude($data['longitude']),
            new Location\Latitude($data['latitude']),
            isset($data['horizontal_accuracy'])
                ? new Location\HorizontalAccuracy($data['horizontal_accuracy'])
                : null,
            isset($data['live_period'])
                ? new Location\LivePeriod($data['live_period'])
                : null,
            isset($data['heading'])
                ? new Location\Heading($data['heading'])
                : null,
            isset($data['proximity_alert_radius'])
                ? new Location\ProximityAlertRadius($data['proximity_alert_radius'])
                : null,
        );
    }
}
