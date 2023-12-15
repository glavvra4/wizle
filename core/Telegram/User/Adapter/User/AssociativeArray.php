<?php

declare(strict_types=1);

namespace Core\Telegram\User\Adapter\User;

use Core\Common\Adapter\BaseAssociativeArray;
use Core\Language\Entity\Language;
use Core\Telegram\User\Entity\User;
use Core\Telegram\User\Entity\UserInterface;

class AssociativeArray extends BaseAssociativeArray implements UserInterface
{
    protected User $user;

    protected function getFieldTypes(): array
    {
        return [
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
    }

    protected function getMandatoryFields(): array
    {
        return [
            'id',
            'is_bot',
            'first_name'
        ];
    }

    /**
     * @param array{id: int, is_bot: bool, first_name: string, last_name: string, username: string, language_code: string, is_premium: bool, added_to_attachment_menu: bool, can_join_groups: bool, can_read_all_group_messages: bool, supports_inline_queries: bool} $data
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->user = new User(
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

    public function getId(): User\Id
    {
        return $this->user->getId();
    }

    public function getIsBot(): User\IsBot
    {
        return $this->user->getIsBot();
    }

    public function getFirstName(): User\FirstName
    {
        return $this->user->getFirstName();
    }

    public function getLastName(): ?User\LastName
    {
        return $this->user->getLastName();
    }

    public function getUsername(): ?User\Username
    {
        return $this->user->getUsername();
    }

    public function getLanguageCode(): ?Language\Subtag
    {
        return $this->user->getLanguageCode();
    }

    public function getIsPremium(): ?User\IsPremium
    {
        return $this->user->getIsPremium();
    }

    public function getAddedToAttachmentMenu(): ?User\AddedToAttachmentMenu
    {
        return $this->user->getAddedToAttachmentMenu();
    }

    public function getCanJoinGroups(): ?User\CanJoinGroups
    {
        return $this->user->getCanJoinGroups();
    }

    public function getCanReadAllGroupMessages(): ?User\CanReadAllGroupMessages
    {
        return $this->user->getCanReadAllGroupMessages();
    }

    public function getSupportsInlineQueries(): ?User\SupportsInlineQueries
    {
        return $this->user->getSupportsInlineQueries();
    }
}
