<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Location\Adapter\Location;

use Core\Telegram\Location\Adapter\Location\AssociativeArray;
use Exception;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'longitude' => 45.072314,
            'latitude' => 39.039317,
            'horizontal_accuracy' => 10,
            'live_period' => 200,
            'heading' => 180,
            'proximity_alert_radius' => 100
        ]);

        $this->assertEquals(
            45.072314,
            $object->getLongitude()->getValue()
        );

        $this->assertEquals(
            39.039317,
            $object->getLatitude()->getValue()
        );

        $this->assertEquals(
            10,
            $object->getHorizontalAccuracy()->getValue()
        );

        $this->assertEquals(
            200,
            $object->getLivePeriod()->getValue()->s
        );

        $this->assertEquals(
            180,
            $object->getHeading()->getValue()
        );

        $this->assertEquals(
            100,
            $object->getProximityAlertRadius()->getValue()
        );
    }
}
