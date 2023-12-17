<?php

declare(strict_types=1);

namespace Core\Telegram\User\Proxy\User;

use Core\Language\Entity\Language;
use Core\Telegram\User\Entity\User;
use JetBrains\PhpStorm\ArrayShape;

readonly class AssociativeArray extends User
{
    public function __construct(
        #[ArrayShape([
            'id' => 'int',
            'is_bot' => 'bool',
            'first_name' => 'string',
            'last_name' => 'string',
            'username' => 'string',
            'language_code' => 'string',
            'is_premium' => 'bool',
            'added_to_attachment_menu' => 'bool',
            'can_join_groups' => 'bool',
            'can_read_all_group_messages' => 'bool',
            'supports_inline_queries' => 'bool'
        ])] array $data
    )
    {
        parent::__construct(
            new User\Id($data['id']),
            new User\IsBot($data['is_bot']),
            new User\FirstName($data['first_name']),
            isset($data['last_name'])
                ? new User\LastName($data['last_name'])
                : null,
            isset($data['username'])
                ? new User\Username($data['username'])
                : null,
            isset($data['language_code'])
                ? new Language\Subtag($data['language_code'])
                : null,
            isset($data['is_premium'])
                ? new User\IsPremium($data['is_premium'])
                : null,
            isset($data['added_to_attachment_menu'])
                ? new User\AddedToAttachmentMenu($data['added_to_attachment_menu'])
                : null,
            isset($data['can_join_groups'])
                ? new User\CanJoinGroups($data['can_join_groups'])
                : null,
            isset($data['can_read_all_group_messages'])
                ? new User\CanReadAllGroupMessages($data['can_read_all_group_messages'])
                : null,
            isset($data['supports_inline_queries'])
                ? new User\SupportsInlineQueries($data['supports_inline_queries'])
                : null,
        );
    }
}
