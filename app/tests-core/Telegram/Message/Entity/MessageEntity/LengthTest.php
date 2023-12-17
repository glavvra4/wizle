<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Message\Entity\MessageEntity;

use Core\Telegram\Message\Entity\MessageEntity\{Exception\InvalidLengthException, Length};
use PHPUnit\Framework\TestCase;

class LengthTest extends TestCase
{
    public function testGetValue()
    {
        $object = new Length(2);

        $this->assertEquals(
            2,
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidLengthException::class);
        new Length(-1);
    }
}
