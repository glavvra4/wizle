<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Entity;

use Core\Telegram\Poll\Entity\PollOption;
use Core\Telegram\Poll\Entity\PollOptionIds;
use Core\Telegram\Poll\Entity\PollOptionInterface;
use Core\Telegram\Poll\Entity\PollOptions;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class PollOptionIdsTest extends TestCase
{
    public function testGetValues()
    {
        $pollOptionIdStub1 = $this->createStub(PollOption\Id::class);
        $pollOptionIdStub1->method('getValue')
            ->willReturn(10);

        $pollOptionIdStub2 = $this->createStub(PollOption\Id::class);
        $pollOptionIdStub2->method('getValue')
            ->willReturn(11);

        $object = new PollOptionIds([
            $pollOptionIdStub1,
            $pollOptionIdStub2
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

        $this->expectError();
        $object[0] = $this->createStub(PollOption\Id::class);
    }

    public function testArrayAccessUnsetError()
    {
        $object = new PollOptionIds([
            $this->createStub(PollOption\Id::class)
        ]);

        $this->expectError();
        unset($object[0]);
    }
}
