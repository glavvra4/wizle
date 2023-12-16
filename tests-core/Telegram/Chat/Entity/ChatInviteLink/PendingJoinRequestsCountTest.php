<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Chat\Entity\ChatInviteLink;

use Core\Telegram\Chat\Entity\ChatInviteLink\{
    Exception\InvalidPendingJoinRequestsCountException,
    PendingJoinRequestCount
};
use PHPUnit\Framework\TestCase;

class PendingJoinRequestsCountTest extends TestCase
{
    public function testGetValue()
    {
        $object = new PendingJoinRequestCount(10);

        $this->assertEquals(
            10,
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidPendingJoinRequestsCountException::class);
        new PendingJoinRequestCount(-1);
    }
}
