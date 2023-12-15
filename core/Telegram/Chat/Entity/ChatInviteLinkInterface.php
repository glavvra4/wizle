<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity;

use Core\Telegram\User\Entity\UserInterface;

interface ChatInviteLinkInterface
{
    /**
     * @return ChatInviteLink\InviteLink
     */
    public function getInviteLink(): ChatInviteLink\InviteLink;

    /**
     * @return UserInterface
     */
    public function getCreator(): UserInterface;

    /**
     * @return ChatInviteLink\CreatesJoinRequest
     */
    public function getCreatesJoinRequest(): ChatInviteLink\CreatesJoinRequest;

    /**
     * @return ChatInviteLink\IsPrimary
     */
    public function getIsPrimary(): ChatInviteLink\IsPrimary;

    /**
     * @return ChatInviteLink\IsRevoked
     */
    public function getIsRevoked(): ChatInviteLink\IsRevoked;

    /**
     * @return ChatInviteLink\Name|null
     */
    public function getName(): ?ChatInviteLink\Name;

    /**
     * @return ChatInviteLink\ExpireDate|null
     */
    public function getExpireDate(): ?ChatInviteLink\ExpireDate;

    /**
     * @return ChatInviteLink\MemberLimit|null
     */
    public function getMemberLimit(): ?ChatInviteLink\MemberLimit;

    /**
     * @return ChatInviteLink\PendingJoinRequestsCount|null
     */
    public function getPendingJoinRequestsCount(): ?ChatInviteLink\PendingJoinRequestsCount;
}
