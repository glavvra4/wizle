<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Location\Entity\Location;

use Core\Telegram\Location\Entity\Location\{Exception\InvalidHeadingException, Heading};
use PHPUnit\Framework\TestCase;

class HeadingTest extends TestCase
{
    public function testGetValue()
    {
        $object = new Heading(2);

        $this->assertEquals(
            2,
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidHeadingException::class);
        new Heading(-1);
    }
}
