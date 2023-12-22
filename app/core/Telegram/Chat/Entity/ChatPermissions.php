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
        public readonly ?ChatPermissions\CanSendMessages       $canSendMessages = null,
        public readonly ?ChatPermissions\CanSendAudios         $canSendAudios = null,
        public readonly ?ChatPermissions\CanSendDocuments      $canSendDocuments = null,
        public readonly ?ChatPermissions\CanSendPhotos         $canSendPhotos = null,
        public readonly ?ChatPermissions\CanSendVideos         $canSendVideos = null,
        public readonly ?ChatPermissions\CanSendVideoNotes     $canSendVideoNotes = null,
        public readonly ?ChatPermissions\CanSendVoiceNotes     $canSendVoiceNotes = null,
        public readonly ?ChatPermissions\CanSendPolls          $canSendPolls = null,
        public readonly ?ChatPermissions\CanSendOtherMessages  $canSendOtherMessages = null,
        public readonly ?ChatPermissions\CanAddWebPagePreviews $canAddWebPagePreviews = null,
        public readonly ?ChatPermissions\CanChangeInfo         $canChangeInfo = null,
        public readonly ?ChatPermissions\CanInviteUsers        $canInviteUsers = null,
        public readonly ?ChatPermissions\CanPinMessages        $canPinMessages = null,
        public readonly ?ChatPermissions\CanManageTopics       $canManageTopics = null,
    )
    {
    }
}
