<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity;

use Core\Telegram\User\Entity\UserInterface;

class ChatInviteLink implements ChatInviteLinkInterface
{
    /**
     * @param ChatInviteLink\InviteLink $inviteLink
     * @param UserInterface $creator
     * @param ChatInviteLink\CreatesJoinRequest $createsJoinRequest
     * @param ChatInviteLink\IsPrimary $isPrimary
     * @param ChatInviteLink\IsRevoked $isRevoked
     * @param ChatInviteLink\Name|null $name
     * @param ChatInviteLink\ExpireDate|null $expireDate
     * @param ChatInviteLink\MemberLimit|null $memberLimit
     * @param ChatInviteLink\PendingJoinRequestsCount|null $pendingJoinRequestsCount
     */
    public function __construct(
        protected ChatInviteLink\InviteLink $inviteLink,
        protected UserInterface $creator,
        protected ChatInviteLink\CreatesJoinRequest $createsJoinRequest,
        protected ChatInviteLink\IsPrimary $isPrimary,
        protected ChatInviteLink\IsRevoked $isRevoked,
        protected ?ChatInviteLink\Name $name = null,
        protected ?ChatInviteLink\ExpireDate $expireDate = null,
        protected ?ChatInviteLink\MemberLimit $memberLimit = null,
        protected ?ChatInviteLink\PendingJoinRequestsCount $pendingJoinRequestsCount = null
    )
    {
    }

    /**
     * @return ChatInviteLink\InviteLink
     */
    public function getInviteLink(): ChatInviteLink\InviteLink
    {
        return $this->inviteLink;
    }

    /**
     * @return UserInterface
     */
    public function getCreator(): UserInterface
    {
        return $this->creator;
    }

    /**
     * @return ChatInviteLink\CreatesJoinRequest
     */
    public function getCreatesJoinRequest(): ChatInviteLink\CreatesJoinRequest
    {
        return $this->createsJoinRequest;
    }

    /**
     * @return ChatInviteLink\IsPrimary
     */
    public function getIsPrimary(): ChatInviteLink\IsPrimary
    {
        return $this->isPrimary;
    }

    /**
     * @return ChatInviteLink\IsRevoked
     */
    public function getIsRevoked(): ChatInviteLink\IsRevoked
    {
        return $this->isRevoked;
    }

    /**
     * @return ChatInviteLink\Name|null
     */
    public function getName(): ?ChatInviteLink\Name
    {
        return $this->name;
    }

    /**
     * @return ChatInviteLink\ExpireDate|null
     */
    public function getExpireDate(): ?ChatInviteLink\ExpireDate
    {
        return $this->expireDate;
    }

    /**
     * @return ChatInviteLink\MemberLimit|null
     */
    public function getMemberLimit(): ?ChatInviteLink\MemberLimit
    {
        return $this->memberLimit;
    }

    /**
     * @return ChatInviteLink\PendingJoinRequestsCount|null
     */
    public function getPendingJoinRequestsCount(): ?ChatInviteLink\PendingJoinRequestsCount
    {
        return $this->pendingJoinRequestsCount;
    }
}
