<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity;

use Core\Telegram\Chat\Entity\Chat;
use Core\Telegram\Chat\Entity\ForumTopic;
use Core\Telegram\User\Entity\User;

readonly class Message implements MessageInterface
{
    public function __construct(
        public Message\Id     $id,
        public Message\Date   $date,
        public Chat           $chat,
        public ?ForumTopic\Id $threadId = null,
        public ?User          $from = null,
        public ?Chat          $senderChat = null,
        public ?User          $forwardFrom = null,
        public ?Chat          $forwardFromChat = null,
        public ?Message\Id    $forwardFromMessageId = null,
        public ?Message\ForwardSignature $forwardSignature = null,
        public ?Message\ForwardSenderName $forwardSenderName = null,
        public ?Message\ForwardDate $forwardDate = null,
        public ?Message\IsTopicMessage $isTopicMessage = null,
        public ?Message\IsAutomaticForward $isAutomaticForward = null,
        public ?Message $replyToMessage = null,
        public ?User $viaBot = null,
        public ?Message\EditDate $editDate = null,
        public ?Message\HasProtectedContent $hasProtectedContent = null,
        public ?Message\MediaGroupId $mediaGroupId = null,
        public ?Message\Text $text = null,
    )
    {
    }
}
