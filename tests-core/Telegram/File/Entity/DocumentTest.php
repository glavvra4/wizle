<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity;

use Core\Telegram\File\Entity\Document;
use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\PhotoSize;
use PHPUnit\Framework\TestCase;

class DocumentTest extends TestCase
{
    public function testGetValues()
    {
        $thumbnailStub = $this->createStub(PhotoSize::class);
        $thumbnailStub->method('getFileId')
            ->willReturn(new File\Id('thumbnail_stub_file_id'));

        $object = new Document(
            new File\Id('file_id'),
            new File\UniqueId('file_unique_id'),
            $thumbnailStub,
            new File\Name('file_name'),
            new File\MimeType('mime_type'),
            new File\Size(10),
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
            10,
            $object->getFileSize()->getValue()
        );
    }
}
