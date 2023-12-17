<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Chat\Entity;

use Core\Language\Entity\Language;
use Core\Telegram\Chat\Entity\ChatInviteLink;
use Core\Telegram\User\Entity\User;
use PHPUnit\Framework\TestCase;

class ChatInviteLinkTest extends TestCase
{
    public function testGetValues()
    {
        $object = new ChatInviteLink(
            new ChatInviteLink\InviteLink('https://t.me/t_oleynikov'),
            new User(
                new User\Id(10),
                new User\IsBot(false),
                new User\FirstName('creator_first_name'),
            ),
            new ChatInviteLink\CreatesJoinRequest(true),
            new ChatInviteLink\IsPrimary(true),
            new ChatInviteLink\IsRevoked(false),
            new ChatInviteLink\Name('Main link'),
            new ChatInviteLink\ExpireDate(11),
            new ChatInviteLink\MemberLimit(12),
            new ChatInviteLink\PendingJoinRequestCount(13)
        );

        $this->assertEquals(
            'https://t.me/t_oleynikov',
            $object->inviteLink->getValue()
        );

        $this->assertEquals(
            10,
            $object->creator->id->getValue()
        );

        $this->assertEquals(
            true,
            $object->createsJoinRequest->getValue()
        );

        $this->assertEquals(
            true,
            $object->isPrimary->getValue()
        );

        $this->assertEquals(
            false,
            $object->isRevoked->getValue()
        );

        $this->assertEquals(
            'Main link',
            $object->name->getValue()
        );

        $this->assertEquals(
            11,
            $object->expireDate->getValue()
        );

        $this->assertEquals(
            12,
            $object->memberLimit->getValue()
        );

        $this->assertEquals(
            13,
            $object->pendingJoinRequestCount->getValue()
        );
    }
}
