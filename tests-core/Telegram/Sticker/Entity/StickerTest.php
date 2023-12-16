<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Sticker\Entity;

use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\PhotoSize;
use Core\Telegram\Sticker\Entity\MaskPosition;
use Core\Telegram\Sticker\Entity\{
    Sticker,
    StickerSet
};
use PHPUnit\Framework\TestCase;

class StickerTest extends TestCase
{
    public function testGetValues()
    {
        $object = new Sticker(
            new File\Id('file_id'),
            new File\UniqueId('file_unique_id'),
            new Sticker\Type('type'),
            new File\Dimension(10),
            new File\Dimension(11),
            new Sticker\IsAnimated(true),
            new Sticker\IsVideo(true),
            new PhotoSize(
                new File\Id('thumbnail_file_id'),
                new File\UniqueId('thumbnail_file_unique_id'),
                new File\Dimension(12),
                new File\Dimension(13)
            ),
            new Sticker\Emoji('emoji'),
            new StickerSet\Name('set_name'),
            new File(
                new File\Id('premium_animation_file_id'),
                new File\UniqueId('premium_animation_file_unique_id')
            ),
            new MaskPosition(
                new MaskPosition\Point('mask_position_point'),
                new MaskPosition\XShift(14),
                new MaskPosition\YShift(15),
                new MaskPosition\Scale(16),
            ),
            new Sticker\CustomEmojiId('custom_emoji_id'),
            new Sticker\NeedsRepainting(true),
            new File\Size(17)
        );

        $this->assertEquals(
            'file_id',
            $object->fileId->getValue()
        );

        $this->assertEquals(
            'file_unique_id',
            $object->fileUniqueId->getValue()
        );

        $this->assertEquals(
            'type',
            $object->type->getValue()
        );

        $this->assertEquals(
            10,
            $object->width->getValue()
        );

        $this->assertEquals(
            11,
            $object->height->getValue()
        );

        $this->assertEquals(
            true,
            $object->isAnimated->getValue()
        );

        $this->assertEquals(
            true,
            $object->isVideo->getValue()
        );

        $this->assertEquals(
            'thumbnail_file_id',
            $object->thumbnail->fileId->getValue()
        );

        $this->assertEquals(
            'emoji',
            $object->emoji->getValue()
        );

        $this->assertEquals(
            'set_name',
            $object->setName->getValue()
        );

        $this->assertEquals(
            '10',
            $object->width->getValue()
        );

        $this->assertEquals(
            'premium_animation_file_id',
            $object->premiumAnimation->fileId->getValue()
        );

        $this->assertEquals(
            'mask_position_point',
            $object->maskPosition->point->getValue()
        );

        $this->assertEquals(
            'custom_emoji_id',
            $object->customEmojiId->getValue()
        );

        $this->assertEquals(
            true,
            $object->needsRepainting->getValue()
        );

        $this->assertEquals(
            17,
            $object->fileSize->getValue()
        );
    }
}
