<?php

declare(strict_types=1);

namespace Core\Telegram\User\Adapter;

use Core\Common\Adapter\InvalidAdapterDataException;
use Core\Language\Entity\Language;
use Core\Telegram\User\Entity\User;
use Core\Telegram\User\Entity\UserInterface;

readonly class AssociativeArray extends User implements UserInterface
{
    private const TYPES_MAPPING = [
        'id' => 'integer',
        'is_bot' => 'boolean',
        'first_name' => 'string',
        'last_name' => 'string',
        'username' => 'string',
        'language_code' => 'string',
        'is_premium' => 'boolean',
        'added_to_attachment_menu' => 'boolean',
        'can_join_groups' => 'boolean',
        'can_read_all_group_messages' => 'boolean',
        'supports_inline_queries' => 'boolean'
    ];

    private const MANDATORY_MAPPING = [
        'id' => true,
        'is_bot' => true,
        'first_name' => true,
        'last_name' => false,
        'username' => false,
        'language_code' => false,
        'is_premium' => false,
        'added_to_attachment_menu' => false,
        'can_join_groups' => false,
        'can_read_all_group_messages' => false,
        'supports_inline_queries' => false
    ];

    /**
     * @param array{id: int, is_bot: bool, first_name: string, last_name: string, username: string, language_code: string, is_premium: bool, added_to_attachment_menu: bool, can_join_groups: bool, can_read_all_group_messages: bool, supports_inline_queries: bool} $data
     */
    public function __construct(array $data)
    {
        foreach (self::TYPES_MAPPING as $key => $type) {
            if (!array_key_exists($key, $data)) {
                if (self::MANDATORY_MAPPING[$key]){
                    throw new InvalidAdapterDataException(
                        sprintf("Key \"%s\" is mandatory in \"data\" array", $key)
                    );
                }
            }

            if ((gettype($data[$key]) === "NULL") && !self::MANDATORY_MAPPING[$key]) {
                continue;
            }

            if (gettype($data[$key]) !== $type) {
                throw new InvalidAdapterDataException(
                    sprintf("The type of \"%s\" value in \"data\" array must be %s, %s given", $key, $type, gettype($data[$key]))
                );
            }
        }

        parent::__construct(
            new User\Id($data['id']),
            new User\IsBot($data['is_bot']),
            new User\FirstName($data['first_name']),
            (array_key_exists('last_name', $data) && $data['last_name'] !== null)
                ? new User\LastName($data['last_name'])
                : null,
            (array_key_exists('username', $data) && $data['username'] !== null)
                ? new User\Username($data['username'])
                : null,
            (array_key_exists('language_code', $data) && $data['language_code'] !== null)
                ? new Language\Subtag($data['language_code'])
                : null,
            (array_key_exists('is_premium', $data) && $data['is_premium'] !== null)
                ? new User\IsPremium($data['is_premium'])
                : null,
            (array_key_exists('added_to_attachment_menu', $data) && $data['added_to_attachment_menu'] !== null)
                ? new User\AddedToAttachmentMenu($data['added_to_attachment_menu'])
                : null,
            (array_key_exists('can_join_groups', $data) && $data['can_join_groups'] !== null)
                ? new User\CanJoinGroups($data['can_join_groups'])
                : null,
            (array_key_exists('can_read_all_group_messages', $data) && $data['can_read_all_group_messages'] !== null)
                ? new User\CanReadAllGroupMessages($data['can_read_all_group_messages'])
                : null,
            (array_key_exists('supports_inline_queries', $data) && $data['supports_inline_queries'] !== null)
                ? new User\SupportsInlineQueries($data['supports_inline_queries'])
                : null,
        );
    }
}
