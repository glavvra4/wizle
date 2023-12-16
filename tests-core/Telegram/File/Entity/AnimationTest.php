<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity;

use Core\Telegram\File\Entity\{Animation, File, PhotoSize};
use PHPUnit\Framework\TestCase;

class AnimationTest extends TestCase
{
    public function testGetValues()
    {
        $object = new Animation(
            new File\Id('file_id'),
            new File\UniqueId('file_unique_id'),
            new File\Dimension(10),
            new File\Dimension(11),
            new File\Duration(12),
            new PhotoSize(
                new File\Id('thumbnail_file_id'),
                new File\UniqueId('thumbnail_file_unique_id'),
                new File\Dimension(13),
                new File\Dimension(14)
            ),
            new File\Name('file_name'),
            new File\MimeType('mime_type'),
            new File\Size(15),
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
            10,
            $object->width->getValue()
        );

        $this->assertEquals(
            11,
            $object->height->getValue()
        );

        $this->assertEquals(
            12,
            $object->duration->getValue()
        );

        $this->assertEquals(
            'thumbnail_file_id',
            $object->thumbnail?->fileId->getValue()
        );

        $this->assertEquals(
            'file_name',
            $object->fileName->getValue()
        );

        $this->assertEquals(
            'mime_type',
            $object->mimeType->getValue()
        );

        $this->assertEquals(
            15,
            $object->fileSize->getValue()
        );
    }
}
