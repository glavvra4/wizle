<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\User\Proxy\Usernames;

use Core\Telegram\User\Entity\User\Username;
use Core\Telegram\User\Proxy\Usernames\IndexedArray;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class IndexedArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new IndexedArray([
            'username1',
            'username2'
        ]);

        // Testing ArrayAccess

        $this->assertEquals(
            'username1',
            $object[0]->getValue()
        );

        $this->assertEquals(
            'username2',
            $object[1]->getValue()
        );

        // Testing Iterator

        foreach ($object as $key => $item) {
            $this->assertInstanceOf(
                Username::class,
                $item
            );

            $this->assertIsInt($key);
        }
    }

    public function testInvalidArgumentException()
    {
        $this->expectException(InvalidArgumentException::class);

        new IndexedArray([1]);
    }

    public function testArrayAccessSetError()
    {
        $object = new IndexedArray([]);

        $this->expectError();
        $object[0] = new Username('username1');
    }

    public function testArrayAccessUnsetError()
    {
        $object = new IndexedArray([
            'username1'
        ]);

        $this->expectError();
        unset($object[0]);
    }
}
