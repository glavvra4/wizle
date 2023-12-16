<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Chat\Entity;

use Core\Telegram\Chat\Entity\ChatPermissions;
use PHPUnit\Framework\TestCase;

class ChatPermissionsTest extends TestCase
{
    public function testGetValues()
    {
        $object = new ChatPermissions(
            new ChatPermissions\CanSendMessages(true),
            new ChatPermissions\CanSendAudios(true),
            new ChatPermissions\CanSendDocuments(true),
            new ChatPermissions\CanSendPhotos(true),
            new ChatPermissions\CanSendVideos(true),
            new ChatPermissions\CanSendVideoNotes(true),
            new ChatPermissions\CanSendVoiceNotes(true),
            new ChatPermissions\CanSendPolls(true),
            new ChatPermissions\CanSendOtherMessages(true),
            new ChatPermissions\CanAddWebPagePreviews(true),
            new ChatPermissions\CanChangeInfo(true),
            new ChatPermissions\CanInviteUsers(true),
            new ChatPermissions\CanPinMessages(true),
            new ChatPermissions\CanManageTopics(true),
        );

        $this->assertEquals(
            true,
            $object->canSendMessages->getValue()
        );

        $this->assertEquals(
            true,
            $object->canSendAudios->getValue()
        );

        $this->assertEquals(
            true,
            $object->canSendDocuments->getValue()
        );

        $this->assertEquals(
            true,
            $object->canSendPhotos->getValue()
        );

        $this->assertEquals(
            true,
            $object->canSendVideos->getValue()
        );

        $this->assertEquals(
            true,
            $object->canSendVideoNotes->getValue()
        );

        $this->assertEquals(
            true,
            $object->canSendVoiceNotes->getValue()
        );

        $this->assertEquals(
            true,
            $object->canSendPolls->getValue()
        );

        $this->assertEquals(
            true,
            $object->canSendOtherMessages->getValue()
        );

        $this->assertEquals(
            true,
            $object->canAddWebPagePreviews->getValue()
        );

        $this->assertEquals(
            true,
            $object->canChangeInfo->getValue()
        );

        $this->assertEquals(
            true,
            $object->canInviteUsers->getValue()
        );

        $this->assertEquals(
            true,
            $object->canPinMessages->getValue()
        );

        $this->assertEquals(
            true,
            $object->canManageTopics->getValue()
        );
    }
}
