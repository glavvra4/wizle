<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Entity;

use Core\Telegram\Poll\Entity\PollOption;
use Core\Telegram\Poll\Entity\PollOptionInterface;
use Core\Telegram\Poll\Entity\PollOptions;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class PollOptionsTest extends TestCase
{
    public function testGetValues()
    {
        $pollOptionStub1 = $this->createStub(PollOption::class);
        $pollOptionStub1->method('getVoterCount')
            ->willReturn(new PollOption\VoterCount(10));

        $pollOptionStub2 = $this->createStub(PollOption::class);
        $pollOptionStub2->method('getVoterCount')
            ->willReturn(new PollOption\VoterCount(11));

        $object = new PollOptions([
            $pollOptionStub1,
            $pollOptionStub2
        ]);

        // Testing ArrayAccess

        $this->assertEquals(
            10,
            $object[0]->getVoterCount()->getValue()
        );

        $this->assertEquals(
            11,
            $object[1]->getVoterCount()->getValue()
        );

        // Testing Iterator

        foreach ($object as $key => $item) {
            $this->assertInstanceOf(
                PollOptionInterface::class,
                $item
            );

            $this->assertIsInt($key);
        }
    }

    public function testInvalidArgumentException()
    {
        $this->expectException(InvalidArgumentException::class);

        /** @noinspection PhpParamsInspection */
        new PollOptions(['invalidValue']);
    }

    public function testArrayAccessSetError()
    {
        $object = new PollOptions([]);

        $this->expectError();
        $object[0] = $this->createStub(PollOption::class);
    }

    public function testArrayAccessUnsetError()
    {
        $object = new PollOptions([
            $this->createStub(PollOption::class)
        ]);

        $this->expectError();
        unset($object[0]);
    }
}
