<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Proxy\MessageEntity;

use Core\Telegram\Message\Entity\MessageEntity;
use Core\Telegram\Sticker\Entity\Sticker\CustomEmojiId;
use Core\Telegram\User\Proxy\User\AssociativeArray as UserAssociativeArrayProxy;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends MessageEntity
{
    public function __construct(
        #[ArrayShape([
            'type' => 'string',
            'offset' => 'int',
            'length' => 'int',
            'url' => 'string',
            'user' => 'array',
            'language' => 'string',
            'custom_emoji_id' => 'string'
        ])] array $data
    )
    {
        parent::__construct(
            new MessageEntity\Type($data['type']),
            new MessageEntity\Offset($data['offset']),
            new MessageEntity\Length($data['length']),
            isset($data['url'])
                ? new MessageEntity\Url($data['url'])
                : null,
            isset($data['user'])
                ? new UserAssociativeArrayProxy($data['user'])
                : null,
            isset($data['language'])
                ? new MessageEntity\Language($data['language'])
                : null,
            isset($data['custom_emoji_id'])
                ? new CustomEmojiId($data['custom_emoji_id'])
                : null,
        );
    }
}
