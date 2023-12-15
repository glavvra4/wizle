<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Location\Entity\Location;

use Core\Telegram\Location\Entity\Location\Exception\InvalidLatitudeException;
use Core\Telegram\Location\Entity\Location\Latitude;
use PHPUnit\Framework\TestCase;

class LatitudeTest extends TestCase
{
    public function testGetValue()
    {
        $object = new Latitude(2);

        $this->assertEquals(
            2,
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidLatitudeException::class);
        new Latitude(91);
    }
}
