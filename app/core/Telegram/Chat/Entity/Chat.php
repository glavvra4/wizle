<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity;

use Core\Telegram\File\Entity\ChatPhoto;
use Core\Telegram\Message\Entity\Message;
use Core\Telegram\Sticker\Entity\Sticker;
use Core\Telegram\Sticker\Entity\StickerSet;
use Core\Telegram\User\Entity\User;
use Core\Telegram\User\Entity\Usernames;

class Chat implements ChatInterface
{
    public function __construct(
        public readonly Chat\Id                                  $id,
        public readonly Chat\Type                                $type,
        public readonly ?Chat\Title                              $title = null,
        public readonly ?User\Username                           $username = null,
        public readonly ?User\FirstName                          $firstName = null,
        public readonly ?User\LastName                           $lastName = null,
        public readonly ?Chat\IsForum                            $isForum = null,
        public readonly ?ChatPhoto                               $photo = null,
        public readonly ?Usernames                               $activeUsernames = null,
        public readonly ?Sticker\CustomEmojiId                   $emojiStatusCustomEmojiId = null,
        public readonly ?Chat\EmojiStatusExpirationDate          $emojiStatusExpirationDate = null,
        public readonly ?Chat\Bio                                $bio = null,
        public readonly ?Chat\HasPrivateForwards                 $hasPrivateForwards = null,
        public readonly ?Chat\HasRestrictedVoiceAndVideoMessages $hasRestrictedVoiceAndVideoMessages = null,
        public readonly ?Chat\JoinToSendMessages                 $joinToSendMessages = null,
        public readonly ?Chat\JoinByRequest                      $joinByRequest = null,
        public readonly ?Chat\Description                        $description = null,
        public readonly ?ChatInviteLink\InviteLink               $inviteLink = null,
        public readonly ?Message                                 $pinnedMessage = null,
        public readonly ?ChatPermissions                         $permissions = null,
        public readonly ?Chat\SlowModeDelay                      $slowModeDelay = null,
        public readonly ?Chat\MessageAutoDeleteTime              $messageAutoDeleteTime = null,
        public readonly ?Chat\HasAggressiveAntiSpamEnabled       $hasAggressiveAntiSpamEnabled = null,
        public readonly ?Chat\HasHiddenMembers                   $hasHiddenMembers = null,
        public readonly ?Chat\HasProtectedContent                $hasProtectedContent = null,
        public readonly ?StickerSet\Name                         $stickerSetName = null,
        public readonly ?Chat\CanSetStickerSet                   $canSetStickerSet = null,
        public readonly ?Chat\Id                                 $linkedChatId = null,
        public readonly ?ChatLocation                            $location = null,
    )
    {
    }
}
