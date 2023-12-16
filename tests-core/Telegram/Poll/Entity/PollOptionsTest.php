<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Entity;

use LogicException;
use Core\Telegram\Poll\Entity\{PollOption, PollOptions};
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class PollOptionsTest extends TestCase
{
    public function testGetValues()
    {
        $object = new PollOptions([
            new PollOption(
                new PollOption\Text('text1'),
                new PollOption\VoterCount(10)
            ),
            new PollOption(
                new PollOption\Text('text2'),
                new PollOption\VoterCount(11)
            ),
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
        new PollOptions(['invalidValue']);
    }

    public function testArrayAccessSetError()
    {
        $object = new PollOptions([]);

        $this->expectException(LogicException::class);
        $object[0] = new PollOption(
            new PollOption\Text('text'),
            new PollOption\VoterCount(10)
        );
    }

    public function testArrayAccessUnsetError()
    {
        $object = new PollOptions([
            new PollOption(
                new PollOption\Text('text'),
                new PollOption\VoterCount(10)
            )
        ]);

        $this->expectException(LogicException::class);
        unset($object[0]);
    }
}
