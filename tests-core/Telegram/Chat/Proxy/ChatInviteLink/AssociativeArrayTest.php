<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Chat\Proxy\ChatInviteLink;

use Core\Telegram\Chat\Proxy\ChatInviteLink\AssociativeArray;
use Exception;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'invite_link' => 'invite_link',
            'creator' => [
                'id' => 10,
                'is_bot' => false,
                'first_name' => 'first_name',
            ],
            'creates_join_request' => true,
            'is_primary' => true,
            'is_revoked' => false,
            'name' => 'name',
            'expire_date' => 11,
            'member_limit' => 12,
            'pending_join_request_count' => 13
        ]);

        $this->assertEquals(
            'invite_link',
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
            'name',
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
