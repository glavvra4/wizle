<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Sticker\Proxy\Sticker;

use Core\Telegram\Sticker\Proxy\Sticker\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'file_id' => 'file_id',
            'file_unique_id' => 'file_unique_id',
            'type' => 'type',
            'width' => 10,
            'height' => 11,
            'is_animated' => true,
            'is_video' => true,
            'thumbnail' => [
                'file_id' => 'thumbnail_file_id',
                'file_unique_id' => 'thumbnail_file_unique_id',
                'width' => 12,
                'height' => 13
            ],
            'emoji' => 'emoji',
            'set_name' => 'set_name',
            'premium_animation' => [
                'file_id' => 'premium_animation_file_id',
                'file_unique_id' => 'premium_animation_file_unique_id',
            ],
            'mask_position' => [
                'point' => 'mask_position_point',
                'x_shift' => 14,
                'y_shift' => 15,
                'scale' => 16,
            ],
            'custom_emoji_id' => 'custom_emoji_id',
            'needs_repainting' => true,
            'file_size' => 17
        ]);

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
