<?php

declare(strict_types=1);

namespace Core\Telegram\Sticker\Proxy\Sticker;

use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Proxy\PhotoSize\AssociativeArray as PhotoSizeAssociativeArrayProxy;
use Core\Telegram\File\Proxy\File\AssociativeArray as FileAssociativeArrayProxy;
use Core\Telegram\Sticker\Proxy\MaskPosition\AssociativeArray as MaskPositionAssociativeArrayProxy;
use Core\Telegram\Sticker\Entity\{
    Sticker,
    StickerSet
};
use JetBrains\PhpStorm\ArrayShape;

readonly class AssociativeArray extends Sticker
{
    public function __construct(
        #[ArrayShape([
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'type' => 'string',
            'width' => 'int',
            'height' => 'int',
            'is_animated' => 'bool',
            'is_video' => 'bool',
            'thumbnail' => 'array',
            'emoji' => 'string',
            'set_name' => 'string',
            'premium_animation' => 'array',
            'mask_position' => 'array',
            'custom_emoji_id' => 'string',
            'needs_repainting' => 'bool',
            'file_size' => 'int'
        ])] array $data
    )
    {
        parent::__construct(
            new File\Id($data['file_id']),
            new File\UniqueId($data['file_unique_id']),
            new Sticker\Type($data['type']),
            new File\Dimension($data['width']),
            new File\Dimension($data['height']),
            new Sticker\IsAnimated($data['is_animated']),
            new Sticker\IsVideo($data['is_video']),
            isset($data['thumbnail'])
                ? new PhotoSizeAssociativeArrayProxy($data['thumbnail'])
                : null,
            isset($data['emoji'])
                ? new Sticker\Emoji($data['emoji'])
                : null,
            isset($data['set_name'])
                ? new StickerSet\Name($data['set_name'])
                : null,
            isset($data['premium_animation'])
                ? new FileAssociativeArrayProxy($data['premium_animation'])
                : null,
            isset($data['mask_position'])
                ? new MaskPositionAssociativeArrayProxy($data['mask_position'])
                : null,
            isset($data['custom_emoji_id'])
                ? new Sticker\CustomEmojiId($data['custom_emoji_id'])
                : null,
            isset($data['needs_repainting'])
                ? new Sticker\NeedsRepainting($data['needs_repainting'])
                : null,
            isset($data['file_size'])
                ? new File\Size($data['file_size'])
                : null
        );
    }
}
