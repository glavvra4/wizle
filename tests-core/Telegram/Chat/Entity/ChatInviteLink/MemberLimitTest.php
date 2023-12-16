<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Chat\Entity\ChatInviteLink;

use Core\Telegram\Chat\Entity\ChatInviteLink\{
    Exception\InvalidMemberLimitException,
    MemberLimit
};
use PHPUnit\Framework\TestCase;

class MemberLimitTest extends TestCase
{
    public function testGetValue()
    {
        $object = new MemberLimit(10);

        $this->assertEquals(
            10,
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidMemberLimitException::class);
        new MemberLimit(-1);
    }
}
