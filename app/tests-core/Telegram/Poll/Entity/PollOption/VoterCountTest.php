<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Entity\PollOption;

use Core\Telegram\Poll\Entity\PollOption\{Exception\InvalidVoterCountException, VoterCount};
use PHPUnit\Framework\TestCase;

class VoterCountTest extends TestCase
{
    public function testGetValue()
    {
        $object = new VoterCount(2);

        $this->assertEquals(
            2,
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidVoterCountException::class);
        new VoterCount(-1);
    }
}
