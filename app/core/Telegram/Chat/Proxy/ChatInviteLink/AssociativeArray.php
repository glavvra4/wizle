<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Proxy\ChatInviteLink;

use Core\Telegram\Chat\Entity\ChatInviteLink;
use Core\Telegram\User\Proxy\User\AssociativeArray as UserAssociativeArrayProxy;
use JetBrains\PhpStorm\ArrayShape;

readonly class AssociativeArray extends ChatInviteLink
{
    public function __construct(
        #[ArrayShape([
            'invite_link' => 'string',
            'creator' => 'array',
            'creates_join_request' => 'bool',
            'is_primary' => 'bool',
            'is_revoked' => 'bool',
            'name' => 'string',
            'expire_date' => 'int',
            'member_limit' => 'int',
            'pending_join_request_count' => 'int',
        ])] array $data
    )
    {
        parent::__construct(
            new ChatInviteLink\InviteLink($data['invite_link']),
            new UserAssociativeArrayProxy($data['creator']),
            new ChatInviteLink\CreatesJoinRequest($data['creates_join_request']),
            new ChatInviteLink\IsPrimary($data['is_primary']),
            new ChatInviteLink\IsRevoked($data['is_revoked']),
            isset($data['name'])
                ? new ChatInviteLink\Name($data['name'])
                : null,
            isset($data['expire_date'])
                ? new ChatInviteLink\ExpireDate($data['expire_date'])
                : null,
            isset($data['member_limit'])
                ? new ChatInviteLink\MemberLimit($data['member_limit'])
                : null,
            isset($data['pending_join_request_count'])
                ? new ChatInviteLink\PendingJoinRequestCount($data['pending_join_request_count'])
                : null,
        );
    }
}
