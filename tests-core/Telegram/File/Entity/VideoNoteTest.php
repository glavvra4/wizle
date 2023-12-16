<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity;

use Core\Telegram\File\Entity\{File, PhotoSize, VideoNote};
use PHPUnit\Framework\TestCase;

class VideoNoteTest extends TestCase
{
    public function testGetValues()
    {
        $object = new VideoNote(
            new File\Id('file_id'),
            new File\UniqueId('file_unique_id'),
            new File\Dimension(10),
            new File\Duration(11),
            new PhotoSize(
                new File\Id('thumbnail_file_id'),
                new File\UniqueId('thumbnail_file_unique_id'),
                new File\Dimension(12),
                new File\Dimension(13)
            ),
            new File\Size(14),
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
            $object->length->getValue()
        );

        $this->assertEquals(
            11,
            $object->duration->getValue()
        );

        $this->assertEquals(
            'thumbnail_file_id',
            $object->thumbnail->fileId->getValue()
        );

        $this->assertEquals(
            14,
            $object->fileSize->getValue()
        );
    }
}
