<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity;

use Core\Telegram\Sticker\Entity\Sticker\CustomEmojiId;
use Core\Telegram\User\Entity\User;

class MessageEntity implements MessageEntityInterface
{
    /**
     * @param MessageEntity\Type $type
     * @param MessageEntity\Offset $offset
     * @param MessageEntity\Length $length
     * @param MessageEntity\Url|null $url
     * @param User|null $user
     * @param MessageEntity\Language|null $language
     * @param CustomEmojiId|null $customEmojiId
     */
    public function __construct(
        public readonly MessageEntity\Type      $type,
        public readonly MessageEntity\Offset    $offset,
        public readonly MessageEntity\Length    $length,
        public readonly ?MessageEntity\Url      $url = null,
        public readonly ?User                   $user = null,
        public readonly ?MessageEntity\Language $language = null,
        public readonly ?CustomEmojiId          $customEmojiId = null,
    )
    {
    }
}
