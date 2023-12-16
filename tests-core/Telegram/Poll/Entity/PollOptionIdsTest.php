<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Entity;

use Core\Telegram\Poll\Entity\PollOption;
use Core\Telegram\Poll\Entity\PollOptionIds;
use InvalidArgumentException;
use LogicException;
use PHPUnit\Framework\TestCase;

class PollOptionIdsTest extends TestCase
{
    public function testGetValues()
    {
        $object = new PollOptionIds([
            new PollOption\Id(10),
            new PollOption\Id(11)
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
        new PollOptionIds(['invalidValue']);
    }

    public function testArrayAccessSetError()
    {
        $object = new PollOptionIds([]);

        $this->expectException(LogicException::class);
        $object[0] = new PollOption\Id(10);
    }

    public function testArrayAccessUnsetError()
    {
        $object = new PollOptionIds([
            new PollOption\Id(10)
        ]);

        $this->expectException(LogicException::class);
        unset($object[0]);
    }
}
