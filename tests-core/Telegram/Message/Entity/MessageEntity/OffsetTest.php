<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Message\Entity\MessageEntity;

use Core\Telegram\Message\Entity\MessageEntity\Exception\InvalidOffsetException;
use Core\Telegram\Message\Entity\MessageEntity\Offset;
use PHPUnit\Framework\TestCase;

class OffsetTest extends TestCase
{
    public function testGetValue()
    {
        $object = new Offset(2);

        $this->assertEquals(
            2,
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidOffsetException::class);
        new Offset(-1);
    }
}
