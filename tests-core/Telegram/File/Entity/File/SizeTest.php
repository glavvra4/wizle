<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity\File;

use Core\Telegram\File\Entity\File\Exception\InvalidSizeException;
use Core\Telegram\File\Entity\File\Size;
use PHPUnit\Framework\TestCase;

class SizeTest extends TestCase
{
    public function testGetValue()
    {
        $object = new Size(10);

        $this->assertEquals(
            10,
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidSizeException::class);
        new Size(-1);
    }
}
