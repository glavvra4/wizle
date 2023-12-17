<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity;

readonly class ChatPermissions implements ChatPermissionsInterface
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
        public ?ChatPermissions\CanSendMessages       $canSendMessages = null,
        public ?ChatPermissions\CanSendAudios         $canSendAudios = null,
        public ?ChatPermissions\CanSendDocuments      $canSendDocuments = null,
        public ?ChatPermissions\CanSendPhotos         $canSendPhotos = null,
        public ?ChatPermissions\CanSendVideos         $canSendVideos = null,
        public ?ChatPermissions\CanSendVideoNotes     $canSendVideoNotes = null,
        public ?ChatPermissions\CanSendVoiceNotes     $canSendVoiceNotes = null,
        public ?ChatPermissions\CanSendPolls          $canSendPolls = null,
        public ?ChatPermissions\CanSendOtherMessages  $canSendOtherMessages = null,
        public ?ChatPermissions\CanAddWebPagePreviews $canAddWebPagePreviews = null,
        public ?ChatPermissions\CanChangeInfo         $canChangeInfo = null,
        public ?ChatPermissions\CanInviteUsers        $canInviteUsers = null,
        public ?ChatPermissions\CanPinMessages        $canPinMessages = null,
        public ?ChatPermissions\CanManageTopics       $canManageTopics = null,
    )
    {
    }
}
