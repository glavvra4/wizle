<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity;

use Core\Telegram\Chat\Entity\ChatInviteLink\InviteLink;
use Core\Telegram\File\Entity\ChatPhotoInterface;
use Core\Telegram\Message\Entity\MessageInterface;
use Core\Telegram\Sticker\Entity\Sticker\CustomEmojiId;
use Core\Telegram\Sticker\Entity\StickerSet;

interface ChatInterface
{
    /**
     * @return Chat\Id
     */
    public function getId(): Chat\Id;

    /**
     * @return Chat\Type
     */
    public function getType(): Chat\Type;

    /**
     * @return Chat\Title|null
     */
    public function getTitle(): ?Chat\Title;

    /**
     * @return Chat\Username|null
     */
    public function getUsername(): ?Chat\Username;

    /**
     * @return Chat\FirstName|null
     */
    public function getFirstName(): ?Chat\FirstName;

    /**
     * @return Chat\LastName|null
     */
    public function getLastName(): ?Chat\LastName;

    /**
     * @return Chat\IsForum|null
     */
    public function getIsForum(): ?Chat\IsForum;

    /**
     * @return ChatPhotoInterface|null
     */
    public function getPhoto(): ?ChatPhotoInterface;

    /**
     * @return UsernamesInterface|null
     */
    public function getActiveUsernames(): ?UsernamesInterface;

    /**
     * @return CustomEmojiId|null
     */
    public function getEmojiStatusCustomEmojiId(): ?CustomEmojiId;

    /**
     * @return Chat\EmojiStatusExpirationDate|null
     */
    public function getEmojiStatusExpirationDate(): ?Chat\EmojiStatusExpirationDate;

    /**
     * @return Chat\Bio|null
     */
    public function getBio(): ?Chat\Bio;

    /**
     * @return Chat\HasPrivateForwards|null
     */
    public function getHasPrivateForwards(): ?Chat\HasPrivateForwards;

    /**
     * @return Chat\HasRestrictedVoiceAndVideoMessages|null
     */
    public function getHasRestrictedVoiceAndVideoMessages(): ?Chat\HasRestrictedVoiceAndVideoMessages;

    /**
     * @return Chat\JoinToSendMessages|null
     */
    public function getJoinToSendMessages(): ?Chat\JoinToSendMessages;

    /**
     * @return Chat\JoinByRequest|null
     */
    public function getJoinByRequest(): ?Chat\JoinByRequest;

    /**
     * @return Chat\Description|null
     */
    public function getDescription(): ?Chat\Description;

    /**
     * @return InviteLink|null
     */
    public function getInviteLink(): ?InviteLink;

    /**
     * @return MessageInterface|null
     */
    public function getPinnedMessage(): ?MessageInterface;

    /**
     * @return ChatPermissionsInterface|null
     */
    public function getPermissions(): ?ChatPermissionsInterface;

    /**
     * @return Chat\SlowModeDelay|null
     */
    public function getSlowModeDelay(): ?Chat\SlowModeDelay;

    /**
     * @return Chat\MessageAutoDeleteTime|null
     */
    public function getMessageAutoDeleteTime(): ?Chat\MessageAutoDeleteTime;

    /**
     * @return Chat\HasAggressiveAntiSpamEnabled|null
     */
    public function getHasAggressiveAntiSpamEnabled(): ?Chat\HasAggressiveAntiSpamEnabled;

    /**
     * @return Chat\HasHiddenMembers|null
     */
    public function getHasHiddenMembers(): ?Chat\HasHiddenMembers;

    /**
     * @return Chat\HasProtectedContent|null
     */
    public function getHasProtectedContent(): ?Chat\HasProtectedContent;

    /**
     * @return StickerSet\Name|null
     */
    public function getStickerSetName(): ?StickerSet\Name;

    /**
     * @return Chat\CanSetStickerSet|null
     */
    public function getCanSetStickerSet(): ?Chat\CanSetStickerSet;

    /**
     * @return Chat\Id|null
     */
    public function getLinkedChatId(): ?Chat\Id;

    /**
     * @return ChatLocationInterface|null
     */
    public function getLocation(): ?ChatLocationInterface;
}
