<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Chat\Proxy\ChatPermissions;

use Core\Telegram\Chat\Proxy\ChatPermissions\AssociativeArray;
use Exception;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'can_send_messages' => true,
            'can_send_audios' => true,
            'can_send_documents' => true,
            'can_send_photos' => true,
            'can_send_videos' => true,
            'can_send_video_notes' => true,
            'can_send_voice_notes' => true,
            'can_send_polls' => true,
            'can_send_other_messages' => true,
            'can_add_web_page_previews' => true,
            'can_change_info' => true,
            'can_invite_users' => true,
            'can_pin_messages' => true,
            'can_manage_topics' => true,
        ]);

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
