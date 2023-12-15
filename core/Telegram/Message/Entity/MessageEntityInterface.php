<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity;

use Core\Telegram\Sticker\Entity\Sticker\CustomEmojiId;
use Core\Telegram\User\Entity\UserInterface;

interface MessageEntityInterface
{
    public function getType(): MessageEntity\Type;
    public function getOffset(): MessageEntity\Offset;
    public function getLength(): MessageEntity\Length;
    public function getUrl(): ?MessageEntity\Url;
    public function getUser(): ?UserInterface;
    public function getLanguage(): ?MessageEntity\Language;
    public function getCustomEmojiId(): ?CustomEmojiId;
}
