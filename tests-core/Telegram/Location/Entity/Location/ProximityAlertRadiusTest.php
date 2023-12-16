<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Location\Entity\Location;

use Core\Telegram\Location\Entity\Location\{Exception\InvalidProximityAlertRadiusException, ProximityAlertRadius};
use PHPUnit\Framework\TestCase;

class ProximityAlertRadiusTest extends TestCase
{
    public function testGetValue()
    {
        $object = new ProximityAlertRadius(2);

        $this->assertEquals(
            2,
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidProximityAlertRadiusException::class);
        new ProximityAlertRadius(-1);
    }
}
