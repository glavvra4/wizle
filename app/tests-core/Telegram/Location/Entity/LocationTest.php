<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Location\Entity;

use Core\Telegram\Location\Entity\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    public function testGetValues()
    {
        $object = new Location(
            new Location\Longitude(10),
            new Location\Latitude(11),
            new Location\HorizontalAccuracy(12),
            new Location\LivePeriod(13),
            new Location\Heading(14),
            new Location\ProximityAlertRadius(15),
        );

        $this->assertEquals(
            10,
            $object->longitude->getValue()
        );

        $this->assertEquals(
            11,
            $object->latitude->getValue()
        );

        $this->assertEquals(
            12,
            $object->horizontalAccuracy->getValue()
        );

        $this->assertEquals(
            13,
            $object->livePeriod->getValue()
        );

        $this->assertEquals(
            14,
            $object->heading->getValue()
        );

        $this->assertEquals(
            15,
            $object->proximityAlertRadius->getValue()
        );
    }
}
