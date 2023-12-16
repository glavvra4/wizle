<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Chat\Proxy\Chat;

use Core\Telegram\Chat\Proxy\Chat\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'id' => 10,
            'type' => 'type',
            'title' => 'title',
            'username' => 'username',
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'is_forum' => true,
            'photo' => [
                'small_file_id' => 'photo_small_file_id',
                'small_file_unique_id' => 'photo_small_file_unique_id',
                'big_file_id' => 'photo_big_file_id',
                'big_file_unique_id' => 'photo_big_file_unique_id'
            ],
            'active_usernames' => [
                'active_usernames_username1'
            ],
            'emoji_status_custom_emoji_id' => 'emoji_status_custom_emoji_id',
            'emoji_status_expiration_date' => 11,
            'bio' => 'bio',
            'has_private_forwards' => true,
            'has_restricted_voice_and_video_messages' => true,
            'join_to_send_messages' => true,
            'join_by_request' => true,
            'description' => 'description',
            'invite_link' => 'invite_link',
            'pinned_message' => [
                'message_id' => 12,
                'date' => 13,
                'chat' => [
                    'id' => 14,
                    'type' => 'pinned_message_chat_type'
                ]
            ],
            'permissions' => [
                'can_send_messages' => true
            ],
            'slow_mode_delay' => 15,
            'message_auto_delete_time' => 16,
            'has_aggressive_anti_spam_enabled' => true,
            'has_hidden_members' => true,
            'has_protected_content' => true,
            'sticker_set_name' => 'sticker_set_name',
            'can_set_sticker_set' => true,
            'linked_chat_id' => 17,
            'location' => [
                'location' => [
                    'longitude' => 18,
                    'latitude' => 19,
                ],
                'address' => 'address'
            ],
        ]);

        $this->assertEquals(
            10,
            $object->id->getValue()
        );

        $this->assertEquals(
            'type',
            $object->type->getValue()
        );

        $this->assertEquals(
            'title',
            $object->title->getValue()
        );

        $this->assertEquals(
            'username',
            $object->username->getValue()
        );

        $this->assertEquals(
            'first_name',
            $object->firstName->getValue()
        );

        $this->assertEquals(
            'last_name',
            $object->lastName->getValue()
        );

        $this->assertEquals(
            true,
            $object->isForum->getValue()
        );

        $this->assertEquals(
            'photo_small_file_id',
            $object->photo->smallFile->fileId->getValue()
        );

        $this->assertEquals(
            'active_usernames_username1',
            $object->activeUsernames[0]->getValue()
        );

        $this->assertEquals(
            'emoji_status_custom_emoji_id',
            $object->emojiStatusCustomEmojiId->getValue()
        );

        $this->assertEquals(
            11,
            $object->emojiStatusExpirationDate->getValue()
        );

        $this->assertEquals(
            'bio',
            $object->bio->getValue()
        );

        $this->assertEquals(
            true,
            $object->hasPrivateForwards->getValue()
        );

        $this->assertEquals(
            true,
            $object->hasRestrictedVoiceAndVideoMessages->getValue()
        );

        $this->assertEquals(
            true,
            $object->joinToSendMessages->getValue()
        );

        $this->assertEquals(
            true,
            $object->joinByRequest->getValue()
        );

        $this->assertEquals(
            'description',
            $object->description->getValue()
        );

        $this->assertEquals(
            'invite_link',
            $object->inviteLink->getValue()
        );

        $this->assertEquals(
            12,
            $object->pinnedMessage->id->getValue()
        );

        $this->assertEquals(
            true,
            $object->permissions->canSendMessages->getValue()
        );

        $this->assertEquals(
            15,
            $object->slowModeDelay->getValue()
        );

        $this->assertEquals(
            16,
            $object->messageAutoDeleteTime->getValue()
        );

        $this->assertEquals(
            true,
            $object->hasAggressiveAntiSpamEnabled->getValue()
        );

        $this->assertEquals(
            true,
            $object->hasHiddenMembers->getValue()
        );

        $this->assertEquals(
            true,
            $object->hasProtectedContent->getValue()
        );

        $this->assertEquals(
            'sticker_set_name',
            $object->stickerSetName->getValue()
        );

        $this->assertEquals(
            true,
            $object->canSetStickerSet->getValue()
        );

        $this->assertEquals(
            17,
            $object->linkedChatId->getValue()
        );

        $this->assertEquals(
            18,
            $object->location->location->longitude->getValue()
        );
    }
}
