<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Location\Entity\Location;

use Core\Telegram\Location\Entity\Location\Exception\InvalidHorizontalAccuracyException;
use Core\Telegram\Location\Entity\Location\HorizontalAccuracy;
use PHPUnit\Framework\TestCase;

class HorizontalAccuracyTest extends TestCase
{
    public function testGetValue()
    {
        $object = new HorizontalAccuracy(2);

        $this->assertEquals(
            2,
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidHorizontalAccuracyException::class);
        new HorizontalAccuracy(-1);
    }
}
