<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Entity\Poll;

use Core\Telegram\Poll\Entity\Poll\Exception\InvalidTotalVoterCountException;
use Core\Telegram\Poll\Entity\Poll\TotalVoterCount;
use PHPUnit\Framework\TestCase;

class TotalVoterCountTest extends TestCase
{
    public function testGetValue()
    {
        $object = new TotalVoterCount(2);

        $this->assertEquals(
            2,
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidTotalVoterCountException::class);
        new TotalVoterCount(-1);
    }
}
