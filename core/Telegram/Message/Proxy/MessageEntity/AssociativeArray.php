<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Proxy\MessageEntity;

use Core\Common\Proxy\BaseAssociativeArray;
use Core\Telegram\Message\Entity\MessageEntity;
use Core\Telegram\Message\Entity\MessageEntityInterface;
use Core\Telegram\Sticker\Entity\Sticker\CustomEmojiId;
use Core\Telegram\User\Proxy\User\AssociativeArray as UserAssociativeArrayProxy;
use Core\Telegram\User\Entity\UserInterface;

class AssociativeArray extends BaseAssociativeArray implements MessageEntityInterface
{
    protected MessageEntity $messageEntity;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'type' => 'string',
            'offset' => 'integer',
            'length' => 'integer',
            'url' => 'string',
            'user' => 'array',
            'language' => 'string',
            'custom_emoji_id' => 'string'
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMandatoryFields(): array
    {
        return [
            'type',
            'offset',
            'length'
        ];
    }

    /**
     * @param array{type: string, offset: integer, length: integer, url: string, user: array, language: string, custom_emoji_id: string} $data
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->messageEntity = new MessageEntity(
            new MessageEntity\Type($data['type']),
            new MessageEntity\Offset($data['offset']),
            new MessageEntity\Length($data['length']),
            (array_key_exists('url', $data) && $data['url'] !== null)
                ? new MessageEntity\Url($data['url'])
                : null,
            (array_key_exists('user', $data) && $data['user'] !== null)
                ? new UserAssociativeArrayProxy($data['user'])
                : null,
            (array_key_exists('language', $data) && $data['language'] !== null)
                ? new MessageEntity\Language($data['language'])
                : null,
            (array_key_exists('custom_emoji_id', $data) && $data['custom_emoji_id'] !== null)
                ? new CustomEmojiId($data['custom_emoji_id'])
                : null,
        );
    }

    public function getType(): MessageEntity\Type
    {
        return $this->messageEntity->getType();
    }

    public function getOffset(): MessageEntity\Offset
    {
        return $this->messageEntity->getOffset();
    }

    public function getLength(): MessageEntity\Length
    {
        return $this->messageEntity->getLength();
    }

    public function getUrl(): ?MessageEntity\Url
    {
        return $this->messageEntity->getUrl();
    }

    public function getUser(): ?UserInterface
    {
        return $this->messageEntity->getUser();
    }

    public function getLanguage(): ?MessageEntity\Language
    {
        return $this->messageEntity->getLanguage();
    }

    public function getCustomEmojiId(): ?CustomEmojiId
    {
        return $this->messageEntity->getCustomEmojiId();
    }
}
