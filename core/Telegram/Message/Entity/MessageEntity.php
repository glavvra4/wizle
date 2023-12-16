<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity;

use Core\Telegram\Sticker\Entity\Sticker\CustomEmojiId;
use Core\Telegram\User\Entity\User;

readonly class MessageEntity implements MessageEntityInterface
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
        public MessageEntity\Type      $type,
        public MessageEntity\Offset    $offset,
        public MessageEntity\Length    $length,
        public ?MessageEntity\Url      $url = null,
        public ?User                   $user = null,
        public ?MessageEntity\Language $language = null,
        public ?CustomEmojiId          $customEmojiId = null,
    )
    {
    }
}
