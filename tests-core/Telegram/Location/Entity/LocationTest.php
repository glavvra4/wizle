<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Location\Entity;

use Core\Telegram\Location\Entity\Location;
use DateInterval;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    public function testGetValues()
    {
        $object = new Location(
            new Location\Longitude(45.072314),
            new Location\Latitude(39.039317),
            new Location\HorizontalAccuracy(10),
            new Location\LivePeriod(new DateInterval('PT200S')),
            new Location\Heading(180),
            new Location\ProximityAlertRadius(100),
        );

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
