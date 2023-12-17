<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Proxy\Chat;

use Core\Telegram\Chat\Entity\{Chat, ChatInviteLink};
use Core\Telegram\Chat\Proxy\ChatLocation\AssociativeArray as ChatLocationAssociativeArrayProxy;
use Core\Telegram\Chat\Proxy\ChatPermissions\AssociativeArray as ChatPermissionsAssociativeArrayProxy;
use Core\Telegram\File\Proxy\ChatPhoto\AssociativeArray as ChatPhotoAssociativeArrayProxy;
use Core\Telegram\Message\Proxy\Message\AssociativeArray as MessageAssociativeArrayProxy;
use Core\Telegram\Sticker\Entity\{Sticker, StickerSet};
use Core\Telegram\User\Entity\User;
use Core\Telegram\User\Proxy\Usernames\IndexedArray as ChatUsernamesIndexedArrayProxy;
use JetBrains\PhpStorm\ArrayShape;

readonly class AssociativeArray extends Chat
{
    public function __construct(
        #[ArrayShape([
            'id' => 'int',
            'type' => 'string',
            'title' => 'string',
            'username' => 'string',
            'first_name' => 'string',
            'last_name' => 'string',
            'is_forum' => 'bool',
            'photo' => 'array',
            'active_usernames' => 'array',
            'emoji_status_custom_emoji_id' => 'string',
            'emoji_status_expiration_date' => 'int',
            'bio' => 'string',
            'has_private_forwards' => 'bool',
            'has_restricted_voice_and_video_messages' => 'bool',
            'join_to_send_messages' => 'bool',
            'join_by_request' => 'bool',
            'description' => 'string',
            'invite_link' => 'string',
            'pinned_message' => 'array',
            'permissions' => 'array',
            'slow_mode_delay' => 'int',
            'message_auto_delete_time' => 'int',
            'has_aggressive_anti_spam_enabled' => 'bool',
            'has_hidden_members' => 'bool',
            'has_protected_content' => 'bool',
            'sticker_set_name' => 'string',
            'can_set_sticker_set' => 'bool',
            'linked_chat_id' => 'int',
            'location' => 'array',
        ])] array $data
    )
    {
        parent::__construct(
            new Chat\Id($data['id']),
            new Chat\Type($data['type']),
            isset($data['title'])
                ? new Chat\Title($data['title'])
                : null,
            isset($data['username'])
                ? new User\Username($data['username'])
                : null,
            isset($data['first_name'])
                ? new User\FirstName($data['first_name'])
                : null,
            isset($data['last_name'])
                ? new User\LastName($data['last_name'])
                : null,
            isset($data['is_forum'])
                ? new Chat\IsForum($data['is_forum'])
                : null,
            isset($data['photo'])
                ? new ChatPhotoAssociativeArrayProxy($data['photo'])
                : null,
            isset($data['active_usernames'])
                ? new ChatUsernamesIndexedArrayProxy($data['active_usernames'])
                : null,
            isset($data['emoji_status_custom_emoji_id'])
                ? new Sticker\CustomEmojiId($data['emoji_status_custom_emoji_id'])
                : null,
            isset($data['emoji_status_expiration_date'])
                ? new Chat\EmojiStatusExpirationDate($data['emoji_status_expiration_date'])
                : null,
            isset($data['bio'])
                ? new Chat\Bio($data['bio'])
                : null,
            isset($data['has_private_forwards'])
                ? new Chat\HasPrivateForwards($data['has_private_forwards'])
                : null,
            isset($data['has_restricted_voice_and_video_messages'])
                ? new Chat\HasRestrictedVoiceAndVideoMessages($data['has_restricted_voice_and_video_messages'])
                : null,
            isset($data['join_to_send_messages'])
                ? new Chat\JoinToSendMessages($data['join_to_send_messages'])
                : null,
            isset($data['join_by_request'])
                ? new Chat\JoinByRequest($data['join_by_request'])
                : null,
            isset($data['description'])
                ? new Chat\Description($data['description'])
                : null,
            isset($data['invite_link'])
                ? new ChatInviteLink\InviteLink($data['invite_link'])
                : null,
            isset($data['pinned_message'])
                ? new MessageAssociativeArrayProxy($data['pinned_message'])
                : null,
            isset($data['permissions'])
                ? new ChatPermissionsAssociativeArrayProxy($data['permissions'])
                : null,
            isset($data['slow_mode_delay'])
                ? new Chat\SlowModeDelay($data['slow_mode_delay'])
                : null,
            isset($data['message_auto_delete_time'])
                ? new Chat\MessageAutoDeleteTime($data['message_auto_delete_time'])
                : null,
            isset($data['has_aggressive_anti_spam_enabled'])
                ? new Chat\HasAggressiveAntiSpamEnabled($data['has_aggressive_anti_spam_enabled'])
                : null,
            isset($data['has_hidden_members'])
                ? new Chat\HasHiddenMembers($data['has_hidden_members'])
                : null,
            isset($data['has_protected_content'])
                ? new Chat\HasProtectedContent($data['has_protected_content'])
                : null,
            isset($data['sticker_set_name'])
                ? new StickerSet\Name($data['sticker_set_name'])
                : null,
            isset($data['can_set_sticker_set'])
                ? new Chat\CanSetStickerSet($data['can_set_sticker_set'])
                : null,
            isset($data['linked_chat_id'])
                ? new Chat\Id($data['linked_chat_id'])
                : null,
            isset($data['location'])
                ? new ChatLocationAssociativeArrayProxy($data['location'])
                : null,
        );
    }
}
