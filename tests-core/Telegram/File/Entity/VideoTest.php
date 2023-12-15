<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity;

use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\PhotoSize;
use Core\Telegram\File\Entity\Video;
use DateInterval;
use PHPUnit\Framework\TestCase;

class VideoTest extends TestCase
{
    public function testGetValues()
    {
        $thumbnailStub = $this->createStub(PhotoSize::class);
        $thumbnailStub->method('getFileId')
            ->willReturn(new File\Id('thumbnail_stub_file_id'));

        $object = new Video(
            new File\Id('file_id'),
            new File\UniqueId('file_unique_id'),
            new File\Dimension(10),
            new File\Dimension(11),
            new File\Duration(new DateInterval('PT12S')),
            $thumbnailStub,
            new File\Name('file_name'),
            new File\MimeType('mime_type'),
            new File\Size(13),
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
            11,
            $object->getHeight()->getValue()
        );

        $this->assertEquals(
            12,
            $object->getDuration()->getValue()->s
        );

        $this->assertEquals(
            'thumbnail_stub_file_id',
            $object->getThumbnail()->getFileId()->getValue()
        );

        $this->assertEquals(
            'file_name',
            $object->getFileName()->getValue()
        );

        $this->assertEquals(
            'mime_type',
            $object->getMimeType()->getValue()
        );

        $this->assertEquals(
            13,
            $object->getFileSize()->getValue()
        );
    }
}
