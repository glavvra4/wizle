<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity;

use Core\Telegram\File\Entity\{Audio, File, PhotoSize};
use PHPUnit\Framework\TestCase;

class AudioTest extends TestCase
{
    public function testGetValues()
    {
        $object = new Audio(
            new File\Id('file_id'),
            new File\UniqueId('file_unique_id'),
            new File\Duration(10),
            new Audio\Performer('performer'),
            new Audio\Title('title'),
            new File\Name('file_name'),
            new File\MimeType('mime_type'),
            new File\Size(11),
            new PhotoSize(
                new File\Id('thumbnail_file_id'),
                new File\UniqueId('thumbnail_file_unique_id'),
                new File\Dimension(12),
                new File\Dimension(13)
            ),
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
            $object->duration->getValue()
        );

        $this->assertEquals(
            'performer',
            $object->performer->getValue()
        );

        $this->assertEquals(
            'title',
            $object->title->getValue()
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
            11,
            $object->fileSize->getValue()
        );

        $this->assertEquals(
            'thumbnail_file_id',
            $object->thumbnail->fileId->getValue()
        );
    }
}
