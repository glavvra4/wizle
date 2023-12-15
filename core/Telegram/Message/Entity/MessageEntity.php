<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity;

use Core\Telegram\Sticker\Entity\Sticker\CustomEmojiId;
use Core\Telegram\User\Entity\UserInterface;

class MessageEntity implements MessageEntityInterface
{
    /**
     * @param MessageEntity\Type $type
     * @param MessageEntity\Offset $offset
     * @param MessageEntity\Length $length
     * @param MessageEntity\Url|null $url
     * @param UserInterface|null $user
     * @param MessageEntity\Language|null $language
     * @param CustomEmojiId|null $customEmojiId
     */
    public function __construct(
        protected MessageEntity\Type $type,
        protected MessageEntity\Offset $offset,
        protected MessageEntity\Length $length,
        protected ?MessageEntity\Url $url = null,
        protected ?UserInterface $user = null,
        protected ?MessageEntity\Language $language = null,
        protected ?CustomEmojiId $customEmojiId = null,
    )
    {
    }

    /**
     * @return MessageEntity\Type
     */
    public function getType(): MessageEntity\Type
    {
        return $this->type;
    }

    /**
     * @return MessageEntity\Offset
     */
    public function getOffset(): MessageEntity\Offset
    {
        return $this->offset;
    }

    /**
     * @return MessageEntity\Length
     */
    public function getLength(): MessageEntity\Length
    {
        return $this->length;
    }

    /**
     * @return MessageEntity\Url|null
     */
    public function getUrl(): ?MessageEntity\Url
    {
        return $this->url;
    }

    /**
     * @return UserInterface|null
     */
    public function getUser(): ?UserInterface
    {
        return $this->user;
    }

    /**
     * @return MessageEntity\Language|null
     */
    public function getLanguage(): ?MessageEntity\Language
    {
        return $this->language;
    }

    /**
     * @return CustomEmojiId|null
     */
    public function getCustomEmojiId(): ?CustomEmojiId
    {
        return $this->customEmojiId;
    }
}
