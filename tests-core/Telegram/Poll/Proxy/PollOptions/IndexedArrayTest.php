<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Proxy\PollOptions;

use Core\Telegram\Poll\Entity\PollOption;
use Core\Telegram\Poll\Proxy\PollOptions\IndexedArray;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class IndexedArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new IndexedArray([
            [
                'text' => 'text',
                'voter_count' => 10
            ],
            [
                'text' => 'text',
                'voter_count' => 11
            ]
        ]);

        // Testing ArrayAccess

        $this->assertEquals(
            10,
            $object[0]->voterCount->getValue()
        );

        $this->assertEquals(
            11,
            $object[1]->voterCount->getValue()
        );

        // Testing Iterator

        foreach ($object as $key => $item) {
            $this->assertInstanceOf(
                PollOption::class,
                $item
            );

            $this->assertIsInt($key);
        }
    }

    public function testInvalidArgumentException()
    {
        $this->expectException(InvalidArgumentException::class);

        /** @noinspection PhpParamsInspection */
        new IndexedArray(['invalidValue']);
    }

    public function testArrayAccessSetError()
    {
        $object = new IndexedArray([]);

        $this->expectError();
        $object[0] = new PollOption(
            new PollOption\Text('text'),
            new PollOption\VoterCount(10)
        );
    }

    public function testArrayAccessUnsetError()
    {
        $object = new IndexedArray([
            [
                'text' => 'text',
                'voter_count' => 10
            ]
        ]);

        $this->expectError();
        unset($object[0]);
    }
}
