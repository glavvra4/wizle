<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity;

use Core\Telegram\Chat\Entity\Chat;
use Core\Telegram\Chat\Entity\ForumTopic;
use Core\Telegram\User\Entity\User;

class Message implements MessageInterface
{
    public function __construct(
        public readonly Message\Id     $id,
        public readonly Message\Date   $date,
        public readonly Chat           $chat,
        public readonly ?ForumTopic\Id $threadId = null,
        public readonly ?User          $from = null,
        public readonly ?Chat          $senderChat = null,
        public readonly ?User          $forwardFrom = null,
        public readonly ?Chat          $forwardFromChat = null,
        public readonly ?Message\Id    $forwardFromMessageId = null,
        public readonly ?Message\ForwardSignature $forwardSignature = null,
        public readonly ?Message\ForwardSenderName $forwardSenderName = null,
        public readonly ?Message\ForwardDate $forwardDate = null,
        public readonly ?Message\IsTopicMessage $isTopicMessage = null,
        public readonly ?Message\IsAutomaticForward $isAutomaticForward = null,
        public readonly ?Message $replyToMessage = null,
        public readonly ?User $viaBot = null,
        public readonly ?Message\EditDate $editDate = null,
        public readonly ?Message\HasProtectedContent $hasProtectedContent = null,
        public readonly ?Message\MediaGroupId $mediaGroupId = null,
        public readonly ?Message\Text $text = null,
    )
    {
    }
}
