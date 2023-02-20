<?php

declare(strict_types=1);

namespace Core\Telegram\User\Entity;

use Core\Language\Entity\Language;

/** Represents Telegram user or bot */
readonly class User implements UserInterface
{
    /**
     * @param User\Id $id
     * @param User\IsBot $isBot
     * @param User\FirstName $firstName
     * @param User\LastName|null $lastName
     * @param User\Username|null $username
     * @param Language\Subtag|null $languageCode
     * @param User\IsPremium|null $isPremium
     * @param User\AddedToAttachmentMenu|null $addedToAttachmentMenu
     * @param User\CanJoinGroups|null $canJoinGroups
     * @param User\CanReadAllGroupMessages|null $canReadAllGroupMessages
     * @param User\SupportsInlineQueries|null $supportsInlineQueries
     */
    public function __construct(
        protected User\Id $id,
        protected User\IsBot $isBot,
        protected User\FirstName $firstName,
        protected ?User\LastName $lastName,
        protected ?User\Username $username,
        protected ?Language\Subtag $languageCode,
        protected ?User\IsPremium $isPremium,
        protected ?User\AddedToAttachmentMenu $addedToAttachmentMenu,
        protected ?User\CanJoinGroups $canJoinGroups,
        protected ?User\CanReadAllGroupMessages $canReadAllGroupMessages,
        protected ?User\SupportsInlineQueries $supportsInlineQueries
    )
    {
    }

    /**
     * @return User\Id
     */
    public function getId(): User\Id
    {
        return $this->id;
    }

    /**
     * @return User\IsBot
     */
    public function getIsBot(): User\IsBot
    {
        return $this->isBot;
    }

    /**
     * @return User\FirstName
     */
    public function getFirstName(): User\FirstName
    {
        return $this->firstName;
    }

    /**
     * @return User\LastName|null
     */
    public function getLastName(): ?User\LastName
    {
        return $this->lastName;
    }

    /**
     * @return User\Username|null
     */
    public function getUsername(): ?User\Username
    {
        return $this->username;
    }

    /**
     * @return Language\Subtag|null
     */
    public function getLanguageCode(): ?Language\Subtag
    {
        return $this->languageCode;
    }

    /**
     * @return User\IsPremium|null
     */
    public function getIsPremium(): ?User\IsPremium
    {
        return $this->isPremium;
    }

    /**
     * @return User\AddedToAttachmentMenu|null
     */
    public function getAddedToAttachmentMenu(): ?User\AddedToAttachmentMenu
    {
        return $this->addedToAttachmentMenu;
    }

    /**
     * @return User\CanJoinGroups|null
     */
    public function getCanJoinGroups(): ?User\CanJoinGroups
    {
        return $this->canJoinGroups;
    }

    /**
     * @return User\CanReadAllGroupMessages|null
     */
    public function getCanReadAllGroupMessages(): ?User\CanReadAllGroupMessages
    {
        return $this->canReadAllGroupMessages;
    }

    /**
     * @return User\SupportsInlineQueries|null
     */
    public function getSupportsInlineQueries(): ?User\SupportsInlineQueries
    {
        return $this->supportsInlineQueries;
    }
}
