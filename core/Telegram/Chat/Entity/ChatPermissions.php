<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity;

class ChatPermissions implements ChatPermissionsInterface
{
    /**
     * @param ChatPermissions\CanSendMessages|null $canSendMessages
     * @param ChatPermissions\CanSendAudios|null $canSendAudios
     * @param ChatPermissions\CanSendDocuments|null $canSendDocuments
     * @param ChatPermissions\CanSendPhotos|null $canSendPhotos
     * @param ChatPermissions\CanSendVideos|null $canSendVideos
     * @param ChatPermissions\CanSendVideoNotes|null $canSendVideoNotes
     * @param ChatPermissions\CanSendVoiceNotes|null $canSendVoiceNotes
     * @param ChatPermissions\CanSendPolls|null $canSendPolls
     * @param ChatPermissions\CanSendOtherMessages|null $canSendOtherMessages
     * @param ChatPermissions\CanAddWebPagePreviews|null $canAddWebPagePreviews
     * @param ChatPermissions\CanChangeInfo|null $canChangeInfo
     * @param ChatPermissions\CanInviteUsers|null $canInviteUsers
     * @param ChatPermissions\CanPinMessages|null $canPinMessages
     * @param ChatPermissions\CanManageTopics|null $canManageTopics
     */
    public function __construct(
        protected ?ChatPermissions\CanSendMessages $canSendMessages = null,
        protected ?ChatPermissions\CanSendAudios $canSendAudios = null,
        protected ?ChatPermissions\CanSendDocuments $canSendDocuments = null,
        protected ?ChatPermissions\CanSendPhotos $canSendPhotos = null,
        protected ?ChatPermissions\CanSendVideos $canSendVideos = null,
        protected ?ChatPermissions\CanSendVideoNotes $canSendVideoNotes = null,
        protected ?ChatPermissions\CanSendVoiceNotes $canSendVoiceNotes = null,
        protected ?ChatPermissions\CanSendPolls $canSendPolls = null,
        protected ?ChatPermissions\CanSendOtherMessages $canSendOtherMessages = null,
        protected ?ChatPermissions\CanAddWebPagePreviews $canAddWebPagePreviews = null,
        protected ?ChatPermissions\CanChangeInfo $canChangeInfo = null,
        protected ?ChatPermissions\CanInviteUsers $canInviteUsers = null,
        protected ?ChatPermissions\CanPinMessages $canPinMessages = null,
        protected ?ChatPermissions\CanManageTopics $canManageTopics = null,
    )
    {
    }

    /**
     * @return ChatPermissions\CanSendMessages|null
     */
    public function getCanSendMessages(): ?ChatPermissions\CanSendMessages
    {
        return $this->canSendMessages;
    }

    /**
     * @return ChatPermissions\CanSendAudios|null
     */
    public function getCanSendAudios(): ?ChatPermissions\CanSendAudios
    {
        return $this->canSendAudios;
    }

    /**
     * @return ChatPermissions\CanSendDocuments|null
     */
    public function getCanSendDocuments(): ?ChatPermissions\CanSendDocuments
    {
        return $this->canSendDocuments;
    }

    /**
     * @return ChatPermissions\CanSendPhotos|null
     */
    public function getCanSendPhotos(): ?ChatPermissions\CanSendPhotos
    {
        return $this->canSendPhotos;
    }

    /**
     * @return ChatPermissions\CanSendVideos|null
     */
    public function getCanSendVideos(): ?ChatPermissions\CanSendVideos
    {
        return $this->canSendVideos;
    }

    /**
     * @return ChatPermissions\CanSendVideoNotes|null
     */
    public function getCanSendVideoNotes(): ?ChatPermissions\CanSendVideoNotes
    {
        return $this->canSendVideoNotes;
    }

    /**
     * @return ChatPermissions\CanSendVoiceNotes|null
     */
    public function getCanSendVoiceNotes(): ?ChatPermissions\CanSendVoiceNotes
    {
        return $this->canSendVoiceNotes;
    }

    /**
     * @return ChatPermissions\CanSendPolls|null
     */
    public function getCanSendPolls(): ?ChatPermissions\CanSendPolls
    {
        return $this->canSendPolls;
    }

    /**
     * @return ChatPermissions\CanSendOtherMessages|null
     */
    public function getCanSendOtherMessages(): ?ChatPermissions\CanSendOtherMessages
    {
        return $this->canSendOtherMessages;
    }

    /**
     * @return ChatPermissions\CanAddWebPagePreviews|null
     */
    public function getCanAddWebPagePreviews(): ?ChatPermissions\CanAddWebPagePreviews
    {
        return $this->canAddWebPagePreviews;
    }

    /**
     * @return ChatPermissions\CanChangeInfo|null
     */
    public function getCanChangeInfo(): ?ChatPermissions\CanChangeInfo
    {
        return $this->canChangeInfo;
    }

    /**
     * @return ChatPermissions\CanInviteUsers|null
     */
    public function getCanInviteUsers(): ?ChatPermissions\CanInviteUsers
    {
        return $this->canInviteUsers;
    }

    /**
     * @return ChatPermissions\CanPinMessages|null
     */
    public function getCanPinMessages(): ?ChatPermissions\CanPinMessages
    {
        return $this->canPinMessages;
    }

    /**
     * @return ChatPermissions\CanManageTopics|null
     */
    public function getCanManageTopics(): ?ChatPermissions\CanManageTopics
    {
        return $this->canManageTopics;
    }
}
