<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity;

use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\PhotoSize;
use Core\Telegram\File\Entity\VideoNote;
use DateInterval;
use PHPUnit\Framework\TestCase;

class VideoNoteTest extends TestCase
{
    public function testGetValues()
    {
        $thumbnailStub = $this->createStub(PhotoSize::class);
        $thumbnailStub->method('getFileId')
            ->willReturn(new File\Id('thumbnail_stub_file_id'));

        $object = new VideoNote(
            new File\Id('file_id'),
            new File\UniqueId('file_unique_id'),
            new File\Dimension(10),
            new File\Duration(new DateInterval('PT11S')),
            $thumbnailStub,
            new File\Size(12),
        );

        $this->assertEquals(
            'file_id',
            $object->getFileId()->getValue()
        );

        $this->assertEquals(
            'file_unique_id',
            $object->getFileUniqueId()->getValue()
        );

        $this->assertEquals(
            10,
            $object->getWidth()->getValue()
        );

        $this->assertEquals(
            10,
            $object->getHeight()->getValue()
        );

        $this->assertEquals(
            11,
            $object->getDuration()->getValue()->s
        );

        $this->assertEquals(
            'thumbnail_stub_file_id',
            $object->getThumbnail()->getFileId()->getValue()
        );

        $this->assertEquals(
            12,
            $object->getFileSize()->getValue()
        );
    }
}
