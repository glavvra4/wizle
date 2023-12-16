<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity;

use Core\Telegram\User\Entity\User;

readonly class ChatInviteLink implements ChatInviteLinkInterface
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
        public ChatInviteLink\InviteLink               $inviteLink,
        public User                                    $creator,
        public ChatInviteLink\CreatesJoinRequest       $createsJoinRequest,
        public ChatInviteLink\IsPrimary                $isPrimary,
        public ChatInviteLink\IsRevoked                $isRevoked,
        public ?ChatInviteLink\Name                    $name = null,
        public ?ChatInviteLink\ExpireDate              $expireDate = null,
        public ?ChatInviteLink\MemberLimit             $memberLimit = null,
        public ?ChatInviteLink\PendingJoinRequestCount $pendingJoinRequestCount = null
    )
    {
    }
}
