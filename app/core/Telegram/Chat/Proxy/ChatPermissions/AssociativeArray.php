<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Proxy\ChatPermissions;

use Core\Telegram\Chat\Entity\ChatPermissions;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends ChatPermissions
{
    public function __construct(
        #[ArrayShape([
            'can_send_messages' => 'bool',
            'can_send_audios' => 'bool',
            'can_send_documents' => 'bool',
            'can_send_photos' => 'bool',
            'can_send_videos' => 'bool',
            'can_send_video_notes' => 'bool',
            'can_send_voice_notes' => 'bool',
            'can_send_polls' => 'bool',
            'can_send_other_messages' => 'bool',
            'can_add_web_page_previews' => 'bool',
            'can_change_info' => 'bool',
            'can_invite_users' => 'bool',
            'can_pin_messages' => 'bool',
            'can_manage_topics' => 'bool',
        ])] array $data
    )
    {
        parent::__construct(
            isset($data['can_send_messages'])
                ? new ChatPermissions\CanSendMessages($data['can_send_messages'])
                : null,
            isset($data['can_send_audios'])
                ? new ChatPermissions\CanSendAudios($data['can_send_audios'])
                : null,
            isset($data['can_send_documents'])
                ? new ChatPermissions\CanSendDocuments($data['can_send_documents'])
                : null,
            isset($data['can_send_photos'])
                ? new ChatPermissions\CanSendPhotos($data['can_send_photos'])
                : null,
            isset($data['can_send_videos'])
                ? new ChatPermissions\CanSendVideos($data['can_send_videos'])
                : null,
            isset($data['can_send_video_notes'])
                ? new ChatPermissions\CanSendVideoNotes($data['can_send_video_notes'])
                : null,
            isset($data['can_send_voice_notes'])
                ? new ChatPermissions\CanSendVoiceNotes($data['can_send_voice_notes'])
                : null,
            isset($data['can_send_polls'])
                ? new ChatPermissions\CanSendPolls($data['can_send_polls'])
                : null,
            isset($data['can_send_other_messages'])
                ? new ChatPermissions\CanSendOtherMessages($data['can_send_other_messages'])
                : null,
            isset($data['can_add_web_page_previews'])
                ? new ChatPermissions\CanAddWebPagePreviews($data['can_add_web_page_previews'])
                : null,
            isset($data['can_change_info'])
                ? new ChatPermissions\CanChangeInfo($data['can_change_info'])
                : null,
            isset($data['can_invite_users'])
                ? new ChatPermissions\CanInviteUsers($data['can_invite_users'])
                : null,
            isset($data['can_pin_messages'])
                ? new ChatPermissions\CanPinMessages($data['can_pin_messages'])
                : null,
            isset($data['can_manage_topics'])
                ? new ChatPermissions\CanManageTopics($data['can_manage_topics'])
                : null,
        );
    }
}
