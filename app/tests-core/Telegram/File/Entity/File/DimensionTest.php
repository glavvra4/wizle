<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity\File;

use Core\Telegram\File\Entity\File\{Dimension, Exception\InvalidDimensionException};
use PHPUnit\Framework\TestCase;

class DimensionTest extends TestCase
{
    public function testGetValue()
    {
        $object = new Dimension(10);

        $this->assertEquals(
            10,
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidDimensionException::class);
        new Dimension(-1);
    }
}
