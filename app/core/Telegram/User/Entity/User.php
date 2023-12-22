<?php

declare(strict_types=1);

namespace Core\Telegram\User\Entity;

use Core\Language\Entity\Language;

/** Represents Telegram user or bot */
class User implements UserInterface
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
        public readonly User\Id                       $id,
        public readonly User\IsBot                    $isBot,
        public readonly User\FirstName                $firstName,
        public readonly ?User\LastName                $lastName = null,
        public readonly ?User\Username                $username = null,
        public readonly ?Language\Subtag              $languageCode = null,
        public readonly ?User\IsPremium               $isPremium = null,
        public readonly ?User\AddedToAttachmentMenu   $addedToAttachmentMenu = null,
        public readonly ?User\CanJoinGroups           $canJoinGroups = null,
        public readonly ?User\CanReadAllGroupMessages $canReadAllGroupMessages = null,
        public readonly ?User\SupportsInlineQueries   $supportsInlineQueries = null
    )
    {
    }
}
