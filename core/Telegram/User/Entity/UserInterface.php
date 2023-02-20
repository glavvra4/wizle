<?php

declare(strict_types=1);

namespace Core\Telegram\User\Entity;

use Core\Language\Entity\Language;

interface UserInterface
{
    public function getId(): User\Id;
    public function getIsBot(): User\IsBot;
    public function getFirstName(): User\FirstName;
    public function getLastName(): ?User\LastName;
    public function getUsername(): ?User\Username;
    public function getLanguageCode(): ?Language\Subtag;
    public function getIsPremium(): ?User\IsPremium;
    public function getAddedToAttachmentMenu(): ?User\AddedToAttachmentMenu;
    public function getCanJoinGroups(): ?User\CanJoinGroups;
    public function getCanReadAllGroupMessages(): ?User\CanReadAllGroupMessages;
    public function getSupportsInlineQueries(): ?User\SupportsInlineQueries;
}
