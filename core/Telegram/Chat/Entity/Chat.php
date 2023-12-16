<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity;

use Core\Telegram\File\Entity\ChatPhoto;
use Core\Telegram\Message\Entity\Message;
use Core\Telegram\Sticker\Entity\Sticker;
use Core\Telegram\Sticker\Entity\StickerSet;
use Core\Telegram\User\Entity\User;
use Core\Telegram\User\Entity\Usernames;

readonly class Chat implements ChatInterface
{
    public function __construct(
        public Chat\Id                                  $id,
        public Chat\Type                                $type,
        public ?Chat\Title                              $title = null,
        public ?User\Username                           $username = null,
        public ?User\FirstName                          $firstName = null,
        public ?User\LastName                           $lastName = null,
        public ?Chat\IsForum                            $isForum = null,
        public ?ChatPhoto                               $photo = null,
        public ?Usernames                               $activeUsernames = null,
        public ?Sticker\CustomEmojiId                   $emojiStatusCustomEmojiId = null,
        public ?Chat\EmojiStatusExpirationDate          $emojiStatusExpirationDate = null,
        public ?Chat\Bio                                $bio = null,
        public ?Chat\HasPrivateForwards                 $hasPrivateForwards = null,
        public ?Chat\HasRestrictedVoiceAndVideoMessages $hasRestrictedVoiceAndVideoMessages = null,
        public ?Chat\JoinToSendMessages                 $joinToSendMessages = null,
        public ?Chat\JoinByRequest                      $joinByRequest = null,
        public ?Chat\Description                        $description = null,
        public ?ChatInviteLink\InviteLink               $inviteLink = null,
        public ?Message                                 $pinnedMessage = null,
        public ?ChatPermissions                         $permissions = null,
        public ?Chat\SlowModeDelay                      $slowModeDelay = null,
        public ?Chat\MessageAutoDeleteTime              $messageAutoDeleteTime = null,
        public ?Chat\HasAggressiveAntiSpamEnabled       $hasAggressiveAntiSpamEnabled = null,
        public ?Chat\HasHiddenMembers                   $hasHiddenMembers = null,
        public ?Chat\HasProtectedContent                $hasProtectedContent = null,
        public ?StickerSet\Name                         $stickerSetName = null,
        public ?Chat\CanSetStickerSet                   $canSetStickerSet = null,
        public ?Chat\Id                                 $linkedChatId = null,
        public ?ChatLocation                            $location = null,
    )
    {
    }
}
