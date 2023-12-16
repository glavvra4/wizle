<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Proxy\PollOptionIds;

use Core\Telegram\Poll\Entity\PollOption;
use Core\Telegram\Poll\Proxy\PollOptionIds\IndexedArray;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class IndexedArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new IndexedArray([
            10,
            11
        ]);

        // Testing ArrayAccess

        $this->assertEquals(
            10,
            $object[0]->getValue()
        );

        $this->assertEquals(
            11,
            $object[1]->getValue()
        );

        // Testing Iterator

        foreach ($object as $key => $item) {
            $this->assertInstanceOf(
                PollOption\Id::class,
                $item
            );

            $this->assertIsInt($key);
        }
    }

    public function testInvalidArgumentException()
    {
        $this->expectException(InvalidArgumentException::class);

        /** @noinspection PhpParamsInspection */
        new IndexedArray([['invalidValue']]);
    }

    public function testArrayAccessSetError()
    {
        $object = new IndexedArray([]);

        $this->expectError();
        $object[0] = 10;
    }

    public function testArrayAccessUnsetError()
    {
        $object = new IndexedArray([
            10
        ]);

        $this->expectError();
        unset($object[0]);
    }
}
