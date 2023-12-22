<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity;

use Core\Telegram\User\Entity\User;

class ChatInviteLink implements ChatInviteLinkInterface
{
    /**
     * @param ChatInviteLink\InviteLink $inviteLink
     * @param User $creator
     * @param ChatInviteLink\CreatesJoinRequest $createsJoinRequest
     * @param ChatInviteLink\IsPrimary $isPrimary
     * @param ChatInviteLink\IsRevoked $isRevoked
     * @param ChatInviteLink\Name|null $name
     * @param ChatInviteLink\ExpireDate|null $expireDate
     * @param ChatInviteLink\MemberLimit|null $memberLimit
     * @param ChatInviteLink\PendingJoinRequestCount|null $pendingJoinRequestCount
     */
    public function __construct(
        public readonly ChatInviteLink\InviteLink               $inviteLink,
        public readonly User                                    $creator,
        public readonly ChatInviteLink\CreatesJoinRequest       $createsJoinRequest,
        public readonly ChatInviteLink\IsPrimary                $isPrimary,
        public readonly ChatInviteLink\IsRevoked                $isRevoked,
        public readonly ?ChatInviteLink\Name                    $name = null,
        public readonly ?ChatInviteLink\ExpireDate              $expireDate = null,
        public readonly ?ChatInviteLink\MemberLimit             $memberLimit = null,
        public readonly ?ChatInviteLink\PendingJoinRequestCount $pendingJoinRequestCount = null
    )
    {
    }
}
