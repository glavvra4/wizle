<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Proxy\Chat;

use Core\Common\Proxy\BaseAssociativeArray;
use Core\Telegram\Chat\Proxy\ChatLocation\AssociativeArray as ChatLocationAssociativeArrayProxy;
use Core\Telegram\Chat\Proxy\ChatPermissions\AssociativeArray as ChatPermissionsAssociativeArrayProxy;
use Core\Telegram\Chat\Proxy\Usernames\IndexedArray as ChatUsernamesIndexedArrayProxy;
use Core\Telegram\Chat\Entity\Chat;
use Core\Telegram\Chat\Entity\ChatInterface;
use Core\Telegram\Chat\Entity\ChatInviteLink;
use Core\Telegram\Chat\Entity\ChatInviteLink\InviteLink;
use Core\Telegram\Chat\Entity\ChatLocationInterface;
use Core\Telegram\Chat\Entity\ChatPermissionsInterface;
use Core\Telegram\Chat\Entity\UsernamesInterface;
use Core\Telegram\File\Proxy\ChatPhoto\AssociativeArray as ChatPhotoAssociativeArrayProxy;
use Core\Telegram\File\Entity\ChatPhotoInterface;
use Core\Telegram\Message\Entity\MessageInterface;
use Core\Telegram\Message\Proxy\Message\AssociativeArray as MessageAssociativeArrayProxy;
use Core\Telegram\Sticker\Entity\Sticker\CustomEmojiId;
use Core\Telegram\Sticker\Entity\StickerSet;
use DateInterval;
use Exception;

class AssociativeArray extends BaseAssociativeArray implements ChatInterface
{
    protected Chat $chat;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'id' => 'integer',
            'type' => 'string',
            'title' => 'string',
            'username' => 'string',
            'first_name' => 'string',
            'last_name' => 'string',
            'is_forum' => 'boolean',
            'photo' => 'array',
            'active_usernames' => 'array',
            'emoji_status_custom_emoji_id' => 'string',
            'emoji_status_expiration_date' => 'integer',
            'bio' => 'string',
            'has_private_forwards' => 'boolean',
            'has_restricted_voice_and_video_messages' => 'boolean',
            'join_to_send_messages' => 'boolean',
            'join_by_request' => 'boolean',
            'description' => 'string',
            'invite_link' => 'string',
            'pinned_message' => 'array',
            'permissions' => 'array',
            'slow_mode_delay' => 'integer',
            'message_auto_delete_time' => 'integer',
            'has_aggressive_anti_spam_enabled' => 'boolean',
            'has_hidden_members' => 'boolean',
            'has_protected_content' => 'boolean',
            'sticker_set_name' => 'string',
            'can_set_sticker_set' => 'boolean',
            'linked_chat_id' => 'integer',
            'location' => 'array',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMandatoryFields(): array
    {
        return [
            'id',
            'type',
        ];
    }

    /**
     * @param array $data
     *
     * @throws Exception if invalid DateInterval data given
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->chat = new Chat(
            new Chat\Id($data['id']),
            new Chat\Type($data['type']),
            (array_key_exists('title', $data) && $data['title'] !== null)
                ? new Chat\Title($data['title'])
                : null,
            (array_key_exists('username', $data) && $data['username'] !== null)
                ? new Chat\Username($data['username'])
                : null,
            (array_key_exists('first_name', $data) && $data['first_name'] !== null)
                ? new Chat\FirstName($data['first_name'])
                : null,
            (array_key_exists('last_name', $data) && $data['last_name'] !== null)
                ? new Chat\LastName($data['last_name'])
                : null,
            (array_key_exists('is_forum', $data) && $data['is_forum'] !== null)
                ? new Chat\IsForum($data['is_forum'])
                : null,
            (array_key_exists('photo', $data) && $data['photo'] !== null)
                ? new ChatPhotoAssociativeArrayProxy($data['photo'])
                : null,
            (array_key_exists('active_usernames', $data) && $data['active_usernames'] !== null)
                ? new ChatUsernamesIndexedArrayProxy($data['active_usernames'])
                : null,
            (array_key_exists('emoji_status_custom_emoji_id', $data) && $data['emoji_status_custom_emoji_id'] !== null)
                ? new CustomEmojiId($data['emoji_status_custom_emoji_id'])
                : null,
            (array_key_exists('emoji_status_expiration_date', $data) && $data['emoji_status_expiration_date'] !== null)
                ? new Chat\EmojiStatusExpirationDate($data['emoji_status_expiration_date'])
                : null,
            (array_key_exists('bio', $data) && $data['bio'] !== null)
                ? new Chat\Bio($data['bio'])
                : null,
            (array_key_exists('has_private_forwards', $data) && $data['has_private_forwards'] !== null)
                ? new Chat\HasPrivateForwards($data['has_private_forwards'])
                : null,
            (array_key_exists('has_restricted_voice_and_video_messages', $data) && $data['has_restricted_voice_and_video_messages'] !== null)
                ? new Chat\HasRestrictedVoiceAndVideoMessages($data['has_restricted_voice_and_video_messages'])
                : null,
            (array_key_exists('join_to_send_messages', $data) && $data['join_to_send_messages'] !== null)
                ? new Chat\JoinToSendMessages($data['join_to_send_messages'])
                : null,
            (array_key_exists('join_by_request', $data) && $data['join_by_request'] !== null)
                ? new Chat\JoinByRequest($data['join_by_request'])
                : null,
            (array_key_exists('description', $data) && $data['description'] !== null)
                ? new Chat\Description($data['description'])
                : null,
            (array_key_exists('invite_link', $data) && $data['invite_link'] !== null)
                ? new ChatInviteLink\InviteLink($data['invite_link'])
                : null,
            (array_key_exists('pinned_message', $data) && $data['pinned_message'] !== null)
                ? new MessageAssociativeArrayProxy($data['pinned_message'])
                : null,
            (array_key_exists('permissions', $data) && $data['bio'] !== null)
                ? new ChatPermissionsAssociativeArrayProxy($data['bio'])
                : null,
            (array_key_exists('slow_mode_delay', $data) && $data['slow_mode_delay'] !== null)
                ? new Chat\SlowModeDelay(new DateInterval('PT'.$data['slow_mode_delay'].'S'))
                : null,
            (array_key_exists('message_auto_delete_time', $data) && $data['message_auto_delete_time'] !== null)
                ? new Chat\MessageAutoDeleteTime(new DateInterval('PT'.$data['message_auto_delete_time'].'S'))
                : null,
            (array_key_exists('has_aggressive_anti_spam_enabled', $data) && $data['has_aggressive_anti_spam_enabled'] !== null)
                ? new Chat\HasAggressiveAntiSpamEnabled($data['has_aggressive_anti_spam_enabled'])
                : null,
            (array_key_exists('has_hidden_members', $data) && $data['has_hidden_members'] !== null)
                ? new Chat\HasHiddenMembers($data['has_hidden_members'])
                : null,
            (array_key_exists('has_protected_content', $data) && $data['has_protected_content'] !== null)
                ? new Chat\HasProtectedContent($data['has_protected_content'])
                : null,
            (array_key_exists('sticker_set_name', $data) && $data['sticker_set_name'] !== null)
                ? new StickerSet\Name($data['sticker_set_name'])
                : null,
            (array_key_exists('can_set_sticker_set', $data) && $data['can_set_sticker_set'] !== null)
                ? new Chat\CanSetStickerSet($data['can_set_sticker_set'])
                : null,
            (array_key_exists('linked_chat_id', $data) && $data['linked_chat_id'] !== null)
                ? new Chat\Id($data['linked_chat_id'])
                : null,
            (array_key_exists('location', $data) && $data['location'] !== null)
                ? new ChatLocationAssociativeArrayProxy($data['location'])
                : null,
        );
    }

    /**
     * @return Chat\Id
     */
    public function getId(): Chat\Id
    {
        return $this->chat->getId();
    }

    /**
     * @return Chat\Type
     */
    public function getType(): Chat\Type
    {
        return $this->chat->getType();
    }

    /**
     * @return Chat\Title|null
     */
    public function getTitle(): ?Chat\Title
    {
        return $this->chat->getTitle();
    }

    /**
     * @return Chat\Username|null
     */
    public function getUsername(): ?Chat\Username
    {
        return $this->chat->getUsername();
    }

    /**
     * @return Chat\FirstName|null
     */
    public function getFirstName(): ?Chat\FirstName
    {
        return $this->chat->getFirstName();
    }

    /**
     * @return Chat\LastName|null
     */
    public function getLastName(): ?Chat\LastName
    {
        return $this->chat->getLastName();
    }

    /**
     * @return Chat\IsForum|null
     */
    public function getIsForum(): ?Chat\IsForum
    {
        return $this->chat->getIsForum();
    }

    /**
     * @return ChatPhotoInterface|null
     */
    public function getPhoto(): ?ChatPhotoInterface
    {
        return $this->chat->getPhoto();
    }

    /**
     * @return UsernamesInterface|null
     */
    public function getActiveUsernames(): ?UsernamesInterface
    {
        return $this->chat->getActiveUsernames();
    }

    /**
     * @return CustomEmojiId|null
     */
    public function getEmojiStatusCustomEmojiId(): ?CustomEmojiId
    {
        return $this->chat->getEmojiStatusCustomEmojiId();
    }

    /**
     * @return Chat\EmojiStatusExpirationDate|null
     */
    public function getEmojiStatusExpirationDate(): ?Chat\EmojiStatusExpirationDate
    {
        return $this->chat->getEmojiStatusExpirationDate();
    }

    /**
     * @return Chat\Bio|null
     */
    public function getBio(): ?Chat\Bio
    {
        return $this->chat->getBio();
    }

    /**
     * @return Chat\HasPrivateForwards|null
     */
    public function getHasPrivateForwards(): ?Chat\HasPrivateForwards
    {
        return $this->chat->getHasPrivateForwards();
    }

    /**
     * @return Chat\HasRestrictedVoiceAndVideoMessages|null
     */
    public function getHasRestrictedVoiceAndVideoMessages(): ?Chat\HasRestrictedVoiceAndVideoMessages
    {
        return $this->chat->getHasRestrictedVoiceAndVideoMessages();
    }

    /**
     * @return Chat\JoinToSendMessages|null
     */
    public function getJoinToSendMessages(): ?Chat\JoinToSendMessages
    {
        return $this->chat->getJoinToSendMessages();
    }

    /**
     * @return Chat\JoinByRequest|null
     */
    public function getJoinByRequest(): ?Chat\JoinByRequest
    {
        return $this->chat->getJoinByRequest();
    }

    /**
     * @return Chat\Description|null
     */
    public function getDescription(): ?Chat\Description
    {
        return $this->chat->getDescription();
    }

    /**
     * @return InviteLink|null
     */
    public function getInviteLink(): ?InviteLink
    {
        return $this->chat->getInviteLink();
    }

    /**
     * @return MessageInterface|null
     */
    public function getPinnedMessage(): ?MessageInterface
    {
        return $this->chat->getPinnedMessage();
    }

    /**
     * @return ChatPermissionsInterface|null
     */
    public function getPermissions(): ?ChatPermissionsInterface
    {
        return $this->chat->getPermissions();
    }

    /**
     * @return Chat\SlowModeDelay|null
     */
    public function getSlowModeDelay(): ?Chat\SlowModeDelay
    {
        return $this->chat->getSlowModeDelay();
    }

    /**
     * @return Chat\MessageAutoDeleteTime|null
     */
    public function getMessageAutoDeleteTime(): ?Chat\MessageAutoDeleteTime
    {
        return $this->chat->getMessageAutoDeleteTime();
    }

    /**
     * @return Chat\HasAggressiveAntiSpamEnabled|null
     */
    public function getHasAggressiveAntiSpamEnabled(): ?Chat\HasAggressiveAntiSpamEnabled
    {
        return $this->chat->getHasAggressiveAntiSpamEnabled();
    }

    /**
     * @return Chat\HasHiddenMembers|null
     */
    public function getHasHiddenMembers(): ?Chat\HasHiddenMembers
    {
        return $this->chat->getHasHiddenMembers();
    }

    /**
     * @return Chat\HasProtectedContent|null
     */
    public function getHasProtectedContent(): ?Chat\HasProtectedContent
    {
        return $this->chat->getHasProtectedContent();
    }

    /**
     * @return StickerSet\Name|null
     */
    public function getStickerSetName(): ?StickerSet\Name
    {
        return $this->chat->getStickerSetName();
    }

    /**
     * @return Chat\CanSetStickerSet|null
     */
    public function getCanSetStickerSet(): ?Chat\CanSetStickerSet
    {
        return $this->chat->getCanSetStickerSet();
    }

    /**
     * @return Chat\Id|null
     */
    public function getLinkedChatId(): ?Chat\Id
    {
        return $this->chat->getLinkedChatId();
    }

    /**
     * @return ChatLocationInterface|null
     */
    public function getLocation(): ?ChatLocationInterface
    {
        return $this->chat->getLocation();
    }
}
