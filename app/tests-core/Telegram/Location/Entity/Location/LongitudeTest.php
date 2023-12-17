<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Location\Entity\Location;

use Core\Telegram\Location\Entity\Location\{Exception\InvalidLongitudeException, Longitude};
use PHPUnit\Framework\TestCase;

class LongitudeTest extends TestCase
{
    public function testGetValue()
    {
        $object = new Longitude(2);

        $this->assertEquals(
            2,
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidLongitudeException::class);
        new Longitude(181);
    }
}
