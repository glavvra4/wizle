<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity;

use Core\Telegram\File\Entity\ChatPhotoInterface;
use Core\Telegram\Message\Entity\MessageInterface;
use Core\Telegram\Sticker\Entity\Sticker\CustomEmojiId;
use Core\Telegram\Sticker\Entity\StickerSet;

class Chat implements ChatInterface
{
    /**
     * @param Chat\Id $id
     * @param Chat\Type $type
     * @param Chat\Title|null $title
     * @param Chat\Username|null $username
     * @param Chat\FirstName|null $firstName
     * @param Chat\LastName|null $lastName
     * @param Chat\IsForum|null $isForum
     * @param ChatPhotoInterface|null $photo
     * @param UsernamesInterface|null $activeUsernames
     * @param CustomEmojiId|null $emojiStatusCustomEmojiId
     * @param Chat\EmojiStatusExpirationDate|null $emojiStatusExpirationDate
     * @param Chat\Bio|null $bio
     * @param Chat\HasPrivateForwards|null $hasPrivateForwards
     * @param Chat\HasRestrictedVoiceAndVideoMessages|null $hasRestrictedVoiceAndVideoMessages
     * @param Chat\JoinToSendMessages|null $joinToSendMessages
     * @param Chat\JoinByRequest|null $joinByRequest
     * @param Chat\Description|null $description
     * @param ChatInviteLink\InviteLink|null $inviteLink
     * @param MessageInterface|null $pinnedMessage
     * @param ChatPermissionsInterface|null $permissions
     * @param Chat\SlowModeDelay|null $slowModeDelay
     * @param Chat\MessageAutoDeleteTime|null $messageAutoDeleteTime
     * @param Chat\HasAggressiveAntiSpamEnabled|null $hasAggressiveAntiSpamEnabled
     * @param Chat\HasHiddenMembers|null $hasHiddenMembers
     * @param Chat\HasProtectedContent|null $hasProtectedContent
     * @param StickerSet\Name|null $stickerSetName
     * @param Chat\CanSetStickerSet|null $canSetStickerSet
     * @param Chat\Id|null $linkedChatId
     * @param ChatLocationInterface|null $location
     */
    public function __construct(
        protected Chat\Id $id,
        protected Chat\Type $type,
        protected ?Chat\Title $title = null,
        protected ?Chat\Username $username = null,
        protected ?Chat\FirstName $firstName = null,
        protected ?Chat\LastName $lastName = null,
        protected ?Chat\IsForum $isForum = null,
        protected ?ChatPhotoInterface $photo = null,
        protected ?UsernamesInterface $activeUsernames = null,
        protected ?CustomEmojiId $emojiStatusCustomEmojiId = null,
        protected ?Chat\EmojiStatusExpirationDate $emojiStatusExpirationDate = null,
        protected ?Chat\Bio $bio = null,
        protected ?Chat\HasPrivateForwards $hasPrivateForwards = null,
        protected ?Chat\HasRestrictedVoiceAndVideoMessages $hasRestrictedVoiceAndVideoMessages = null,
        protected ?Chat\JoinToSendMessages $joinToSendMessages = null,
        protected ?Chat\JoinByRequest $joinByRequest = null,
        protected ?Chat\Description $description = null,
        protected ?ChatInviteLink\InviteLink $inviteLink = null,
        protected ?MessageInterface $pinnedMessage = null,
        protected ?ChatPermissionsInterface $permissions = null,
        protected ?Chat\SlowModeDelay $slowModeDelay = null,
        protected ?Chat\MessageAutoDeleteTime $messageAutoDeleteTime = null,
        protected ?Chat\HasAggressiveAntiSpamEnabled $hasAggressiveAntiSpamEnabled = null,
        protected ?Chat\HasHiddenMembers $hasHiddenMembers = null,
        protected ?Chat\HasProtectedContent $hasProtectedContent = null,
        protected ?StickerSet\Name $stickerSetName = null,
        protected ?Chat\CanSetStickerSet $canSetStickerSet = null,
        protected ?Chat\Id $linkedChatId = null,
        protected ?ChatLocationInterface $location = null,
    )
    {
    }

    /**
     * @return Chat\Id
     */
    public function getId(): Chat\Id
    {
        return $this->id;
    }

    /**
     * @return Chat\Type
     */
    public function getType(): Chat\Type
    {
        return $this->type;
    }

    /**
     * @return Chat\Title|null
     */
    public function getTitle(): ?Chat\Title
    {
        return $this->title;
    }

    /**
     * @return Chat\Username|null
     */
    public function getUsername(): ?Chat\Username
    {
        return $this->username;
    }

    /**
     * @return Chat\FirstName|null
     */
    public function getFirstName(): ?Chat\FirstName
    {
        return $this->firstName;
    }

    /**
     * @return Chat\LastName|null
     */
    public function getLastName(): ?Chat\LastName
    {
        return $this->lastName;
    }

    /**
     * @return Chat\IsForum|null
     */
    public function getIsForum(): ?Chat\IsForum
    {
        return $this->isForum;
    }

    /**
     * @return ChatPhotoInterface|null
     */
    public function getPhoto(): ?ChatPhotoInterface
    {
        return $this->photo;
    }

    /**
     * @return UsernamesInterface|null
     */
    public function getActiveUsernames(): ?UsernamesInterface
    {
        return $this->activeUsernames;
    }

    /**
     * @return CustomEmojiId|null
     */
    public function getEmojiStatusCustomEmojiId(): ?CustomEmojiId
    {
        return $this->emojiStatusCustomEmojiId;
    }

    /**
     * @return Chat\EmojiStatusExpirationDate|null
     */
    public function getEmojiStatusExpirationDate(): ?Chat\EmojiStatusExpirationDate
    {
        return $this->emojiStatusExpirationDate;
    }

    /**
     * @return Chat\Bio|null
     */
    public function getBio(): ?Chat\Bio
    {
        return $this->bio;
    }

    /**
     * @return Chat\HasPrivateForwards|null
     */
    public function getHasPrivateForwards(): ?Chat\HasPrivateForwards
    {
        return $this->hasPrivateForwards;
    }

    /**
     * @return Chat\HasRestrictedVoiceAndVideoMessages|null
     */
    public function getHasRestrictedVoiceAndVideoMessages(): ?Chat\HasRestrictedVoiceAndVideoMessages
    {
        return $this->hasRestrictedVoiceAndVideoMessages;
    }

    /**
     * @return Chat\JoinToSendMessages|null
     */
    public function getJoinToSendMessages(): ?Chat\JoinToSendMessages
    {
        return $this->joinToSendMessages;
    }

    /**
     * @return Chat\JoinByRequest|null
     */
    public function getJoinByRequest(): ?Chat\JoinByRequest
    {
        return $this->joinByRequest;
    }

    /**
     * @return Chat\Description|null
     */
    public function getDescription(): ?Chat\Description
    {
        return $this->description;
    }

    /**
     * @return ChatInviteLink\InviteLink|null
     */
    public function getInviteLink(): ?ChatInviteLink\InviteLink
    {
        return $this->inviteLink;
    }

    /**
     * @return MessageInterface|null
     */
    public function getPinnedMessage(): ?MessageInterface
    {
        return $this->pinnedMessage;
    }

    /**
     * @return ChatPermissionsInterface|null
     */
    public function getPermissions(): ?ChatPermissionsInterface
    {
        return $this->permissions;
    }

    /**
     * @return Chat\SlowModeDelay|null
     */
    public function getSlowModeDelay(): ?Chat\SlowModeDelay
    {
        return $this->slowModeDelay;
    }

    /**
     * @return Chat\MessageAutoDeleteTime|null
     */
    public function getMessageAutoDeleteTime(): ?Chat\MessageAutoDeleteTime
    {
        return $this->messageAutoDeleteTime;
    }

    /**
     * @return Chat\HasAggressiveAntiSpamEnabled|null
     */
    public function getHasAggressiveAntiSpamEnabled(): ?Chat\HasAggressiveAntiSpamEnabled
    {
        return $this->hasAggressiveAntiSpamEnabled;
    }

    /**
     * @return Chat\HasHiddenMembers|null
     */
    public function getHasHiddenMembers(): ?Chat\HasHiddenMembers
    {
        return $this->hasHiddenMembers;
    }

    /**
     * @return Chat\HasProtectedContent|null
     */
    public function getHasProtectedContent(): ?Chat\HasProtectedContent
    {
        return $this->hasProtectedContent;
    }

    /**
     * @return StickerSet\Name|null
     */
    public function getStickerSetName(): ?StickerSet\Name
    {
        return $this->stickerSetName;
    }

    /**
     * @return Chat\CanSetStickerSet|null
     */
    public function getCanSetStickerSet(): ?Chat\CanSetStickerSet
    {
        return $this->canSetStickerSet;
    }

    /**
     * @return Chat\Id|null
     */
    public function getLinkedChatId(): ?Chat\Id
    {
        return $this->linkedChatId;
    }

    /**
     * @return ChatLocationInterface|null
     */
    public function getLocation(): ?ChatLocationInterface
    {
        return $this->location;
    }
}
