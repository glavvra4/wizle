<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity;

interface ChatPermissionsInterface
{
    /**
     * @return ChatPermissions\CanSendMessages|null
     */
    public function getCanSendMessages(): ?ChatPermissions\CanSendMessages;

    /**
     * @return ChatPermissions\CanSendAudios|null
     */
    public function getCanSendAudios(): ?ChatPermissions\CanSendAudios;

    /**
     * @return ChatPermissions\CanSendDocuments|null
     */
    public function getCanSendDocuments(): ?ChatPermissions\CanSendDocuments;

    /**
     * @return ChatPermissions\CanSendPhotos|null
     */
    public function getCanSendPhotos(): ?ChatPermissions\CanSendPhotos;

    /**
     * @return ChatPermissions\CanSendVideos|null
     */
    public function getCanSendVideos(): ?ChatPermissions\CanSendVideos;

    /**
     * @return ChatPermissions\CanSendVideoNotes|null
     */
    public function getCanSendVideoNotes(): ?ChatPermissions\CanSendVideoNotes;

    /**
     * @return ChatPermissions\CanSendVoiceNotes|null
     */
    public function getCanSendVoiceNotes(): ?ChatPermissions\CanSendVoiceNotes;

    /**
     * @return ChatPermissions\CanSendPolls|null
     */
    public function getCanSendPolls(): ?ChatPermissions\CanSendPolls;

    /**
     * @return ChatPermissions\CanSendOtherMessages|null
     */
    public function getCanSendOtherMessages(): ?ChatPermissions\CanSendOtherMessages;

    /**
     * @return ChatPermissions\CanAddWebPagePreviews|null
     */
    public function getCanAddWebPagePreviews(): ?ChatPermissions\CanAddWebPagePreviews;

    /**
     * @return ChatPermissions\CanChangeInfo|null
     */
    public function getCanChangeInfo(): ?ChatPermissions\CanChangeInfo;

    /**
     * @return ChatPermissions\CanInviteUsers|null
     */
    public function getCanInviteUsers(): ?ChatPermissions\CanInviteUsers;

    /**
     * @return ChatPermissions\CanPinMessages|null
     */
    public function getCanPinMessages(): ?ChatPermissions\CanPinMessages;

    /**
     * @return ChatPermissions\CanManageTopics|null
     */
    public function getCanManageTopics(): ?ChatPermissions\CanManageTopics;
}
