<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\User\Entity;

use Core\Telegram\User\Entity\User\Username;
use Core\Telegram\User\Entity\Usernames;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class UsernamesTest extends TestCase
{
    public function testGetValues()
    {
        $object = new Usernames([
            new Username('username1'),
            new Username('username2')
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

        /** @noinspection PhpParamsInspection */
        new Usernames(['invalidValue']);
    }

    public function testArrayAccessSetError()
    {
        $object = new Usernames([]);

        $this->expectError();
        $object[0] = new Username('username1');
    }

    public function testArrayAccessUnsetError()
    {
        $object = new Usernames([
            new Username('username1')
        ]);

        $this->expectError();
        unset($object[0]);
    }
}
