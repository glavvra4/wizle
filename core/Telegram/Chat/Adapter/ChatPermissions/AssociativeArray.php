<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Adapter\ChatPermissions;

use Core\Common\Adapter\BaseAssociativeArray;
use Core\Telegram\Chat\Entity\ChatPermissions;
use Core\Telegram\Chat\Entity\ChatPermissionsInterface;

class AssociativeArray extends BaseAssociativeArray implements ChatPermissionsInterface
{
    protected ChatPermissions $chatPermissions;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'can_send_messages' => 'boolean',
            'can_send_audios' => 'boolean',
            'can_send_documents' => 'boolean',
            'can_send_photos' => 'boolean',
            'can_send_videos' => 'boolean',
            'can_send_video_notes' => 'boolean',
            'can_send_voice_notes' => 'boolean',
            'can_send_polls	Boolean' => 'boolean',
            'can_send_other_messages' => 'boolean',
            'can_add_web_page_previews' => 'boolean',
            'can_change_info' => 'boolean',
            'can_invite_users' => 'boolean',
            'can_pin_messages' => 'boolean',
            'can_manage_topics' => 'boolean',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMandatoryFields(): array
    {
        return [
        ];
    }

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->chatPermissions = new ChatPermissions(
            (array_key_exists('can_send_messages', $data) && $data['can_send_messages'] !== null)
                ? new ChatPermissions\CanSendMessages($data['can_send_messages'])
                : null,
            (array_key_exists('can_send_audios', $data) && $data['can_send_audios'] !== null)
                ? new ChatPermissions\CanSendAudios($data['can_send_audios'])
                : null,
            (array_key_exists('can_send_documents', $data) && $data['can_send_documents'] !== null)
                ? new ChatPermissions\CanSendDocuments($data['can_send_documents'])
                : null,
            (array_key_exists('can_send_photos', $data) && $data['can_send_photos'] !== null)
                ? new ChatPermissions\CanSendPhotos($data['can_send_photos'])
                : null,
            (array_key_exists('can_send_videos', $data) && $data['can_send_videos'] !== null)
                ? new ChatPermissions\CanSendVideos($data['can_send_videos'])
                : null,
            (array_key_exists('can_send_video_notes', $data) && $data['can_send_video_notes'] !== null)
                ? new ChatPermissions\CanSendVideoNotes($data['can_send_video_notes'])
                : null,
            (array_key_exists('can_send_voice_notes', $data) && $data['can_send_voice_notes'] !== null)
                ? new ChatPermissions\CanSendVoiceNotes($data['can_send_voice_notes'])
                : null,
            (array_key_exists('can_send_polls', $data) && $data['can_send_polls'] !== null)
                ? new ChatPermissions\CanSendPolls($data['can_send_polls'])
                : null,
            (array_key_exists('can_send_other_messages', $data) && $data['can_send_other_messages'] !== null)
                ? new ChatPermissions\CanSendOtherMessages($data['can_send_other_messages'])
                : null,
            (array_key_exists('can_add_web_page_previews', $data) && $data['can_add_web_page_previews'] !== null)
                ? new ChatPermissions\CanAddWebPagePreviews($data['can_add_web_page_previews'])
                : null,
            (array_key_exists('can_change_info', $data) && $data['can_change_info'] !== null)
                ? new ChatPermissions\CanChangeInfo($data['can_change_info'])
                : null,
            (array_key_exists('can_invite_users', $data) && $data['can_invite_users'] !== null)
                ? new ChatPermissions\CanInviteUsers($data['can_invite_users'])
                : null,
            (array_key_exists('can_pin_messages', $data) && $data['can_pin_messages'] !== null)
                ? new ChatPermissions\CanPinMessages($data['can_pin_messages'])
                : null,
            (array_key_exists('can_mange_topics', $data) && $data['can_mange_topics'] !== null)
                ? new ChatPermissions\CanManageTopics($data['can_mange_topics'])
                : null,
        );
    }

    /**
     * @return ChatPermissions\CanSendMessages|null
     */
    public function getCanSendMessages(): ?ChatPermissions\CanSendMessages
    {
        return $this->chatPermissions->getCanSendMessages();
    }

    /**
     * @return ChatPermissions\CanSendAudios|null
     */
    public function getCanSendAudios(): ?ChatPermissions\CanSendAudios
    {
        return $this->chatPermissions->getCanSendAudios();
    }

    /**
     * @return ChatPermissions\CanSendDocuments|null
     */
    public function getCanSendDocuments(): ?ChatPermissions\CanSendDocuments
    {
        return $this->chatPermissions->getCanSendDocuments();
    }

    /**
     * @return ChatPermissions\CanSendPhotos|null
     */
    public function getCanSendPhotos(): ?ChatPermissions\CanSendPhotos
    {
        return $this->chatPermissions->getCanSendPhotos();
    }

    /**
     * @return ChatPermissions\CanSendVideos|null
     */
    public function getCanSendVideos(): ?ChatPermissions\CanSendVideos
    {
        return $this->chatPermissions->getCanSendVideos();
    }

    /**
     * @return ChatPermissions\CanSendVideoNotes|null
     */
    public function getCanSendVideoNotes(): ?ChatPermissions\CanSendVideoNotes
    {
        return $this->chatPermissions->getCanSendVideoNotes();
    }

    /**
     * @return ChatPermissions\CanSendVoiceNotes|null
     */
    public function getCanSendVoiceNotes(): ?ChatPermissions\CanSendVoiceNotes
    {
        return $this->chatPermissions->getCanSendVoiceNotes();
    }

    /**
     * @return ChatPermissions\CanSendPolls|null
     */
    public function getCanSendPolls(): ?ChatPermissions\CanSendPolls
    {
        return $this->chatPermissions->getCanSendPolls();
    }

    /**
     * @return ChatPermissions\CanSendOtherMessages|null
     */
    public function getCanSendOtherMessages(): ?ChatPermissions\CanSendOtherMessages
    {
        return $this->chatPermissions->getCanSendOtherMessages();
    }

    /**
     * @return ChatPermissions\CanAddWebPagePreviews|null
     */
    public function getCanAddWebPagePreviews(): ?ChatPermissions\CanAddWebPagePreviews
    {
        return $this->chatPermissions->getCanAddWebPagePreviews();
    }

    /**
     * @return ChatPermissions\CanChangeInfo|null
     */
    public function getCanChangeInfo(): ?ChatPermissions\CanChangeInfo
    {
        return $this->chatPermissions->getCanChangeInfo();
    }

    /**
     * @return ChatPermissions\CanInviteUsers|null
     */
    public function getCanInviteUsers(): ?ChatPermissions\CanInviteUsers
    {
        return $this->chatPermissions->getCanInviteUsers();
    }

    /**
     * @return ChatPermissions\CanPinMessages|null
     */
    public function getCanPinMessages(): ?ChatPermissions\CanPinMessages
    {
        return $this->chatPermissions->getCanPinMessages();
    }

    /**
     * @return ChatPermissions\CanManageTopics|null
     */
    public function getCanManageTopics(): ?ChatPermissions\CanManageTopics
    {
        return $this->chatPermissions->getCanManageTopics();
    }
}
