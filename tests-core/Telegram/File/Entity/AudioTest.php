<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity;

use Core\Telegram\File\Entity\Audio;
use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\PhotoSize;
use DateInterval;
use PHPUnit\Framework\TestCase;

class AudioTest extends TestCase
{
    public function testGetValues()
    {
        $thumbnailStub = $this->createStub(PhotoSize::class);
        $thumbnailStub->method('getFileId')
            ->willReturn(new File\Id('thumbnail_stub_file_id'));

        $object = new Audio(
            new File\Id('file_id'),
            new File\UniqueId('file_unique_id'),
            new File\Duration(new DateInterval('PT10S')),
            new Audio\Performer('performer'),
            new Audio\Title('title'),
            new File\Name('file_name'),
            new File\MimeType('mime_type'),
            new File\Size(11),
            $thumbnailStub,
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
            $object->getDuration()->getValue()->s
        );

        $this->assertEquals(
            'performer',
            $object->getPerformer()->getValue()
        );

        $this->assertEquals(
            'title',
            $object->getTitle()->getValue()
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
            11,
            $object->getFileSize()->getValue()
        );

        $this->assertEquals(
            'thumbnail_stub_file_id',
            $object->getThumbnail()->getFileId()->getValue()
        );
    }
}
