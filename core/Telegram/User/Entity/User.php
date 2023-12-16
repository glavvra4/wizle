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
        public User\Id                       $id,
        public User\IsBot                    $isBot,
        public User\FirstName                $firstName,
        public ?User\LastName                $lastName = null,
        public ?User\Username                $username = null,
        public ?Language\Subtag              $languageCode = null,
        public ?User\IsPremium               $isPremium = null,
        public ?User\AddedToAttachmentMenu   $addedToAttachmentMenu = null,
        public ?User\CanJoinGroups           $canJoinGroups = null,
        public ?User\CanReadAllGroupMessages $canReadAllGroupMessages = null,
        public ?User\SupportsInlineQueries   $supportsInlineQueries = null
    )
    {
    }
}
