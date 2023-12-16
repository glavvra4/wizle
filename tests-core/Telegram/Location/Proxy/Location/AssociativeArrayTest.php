<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Location\Proxy\Location;

use Core\Telegram\Location\Proxy\Location\AssociativeArray;
use Exception;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'longitude' => 10,
            'latitude' => 11,
            'horizontal_accuracy' => 12,
            'live_period' => 13,
            'heading' => 14,
            'proximity_alert_radius' => 15
        ]);

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
