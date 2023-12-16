<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Chat\Entity;

use Core\Telegram\Chat\Entity\{
    Chat,
    ChatInviteLink,
    ChatLocation,
    ChatPermissions
};
use Core\Telegram\File\Entity\{
    ChatPhoto,
    File
};
use Core\Telegram\Location\Entity\Location;
use Core\Telegram\Message\Entity\Message;
use Core\Telegram\Sticker\Entity\{
    Sticker,
    StickerSet
};
use Core\Telegram\User\Entity\{
    User,
    Usernames
};
use PHPUnit\Framework\TestCase;

class ChatTest extends TestCase
{
    public function testGetValues()
    {
        $object = new Chat(
            new Chat\Id(10),
            new Chat\Type('type'),
            new Chat\Title('title'),
            new User\Username('username'),
            new User\FirstName('first_name'),
            new User\LastName('last_name'),
            new Chat\IsForum(true),
            new ChatPhoto(
                new File\Id('photo_small_file_id'),
                new File\UniqueId('photo_small_file_unique_id'),
                new File\Id('photo_big_file_id'),
                new File\UniqueId('photo_big_file_unique_id')
            ),
            new Usernames([
                new User\Username('active_usernames_username1')
            ]),
            new Sticker\CustomEmojiId('emoji_status_custom_emoji_id'),
            new Chat\EmojiStatusExpirationDate(11),
            new Chat\Bio('bio'),
            new Chat\HasPrivateForwards(true),
            new Chat\HasRestrictedVoiceAndVideoMessages(true),
            new Chat\JoinToSendMessages(true),
            new Chat\JoinByRequest(true),
            new Chat\Description('description'),
            new ChatInviteLink\InviteLink('invite_link'),
            new Message(
                new Message\Id(12),
                new Message\Date(13),
                new Chat(
                    new Chat\Id(14),
                    new Chat\Type('pinned_message_chat_type'),
                )
            ),
            new ChatPermissions(
                new ChatPermissions\CanSendMessages(true),
            ),
            new Chat\SlowModeDelay(15),
            new Chat\MessageAutoDeleteTime(16),
            new Chat\HasAggressiveAntiSpamEnabled(true),
            new Chat\HasHiddenMembers(true),
            new Chat\HasProtectedContent(true),
            new StickerSet\Name('sticker_set_name'),
            new Chat\CanSetStickerSet(true),
            new Chat\Id(17),
            new ChatLocation(
                new Location(
                    new Location\Longitude(18),
                    new Location\Latitude(19)
                ),
                new ChatLocation\Address('location_address')
            ),
        );

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
