<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Proxy\Video;

use Core\Telegram\File\Proxy\Video\AssociativeArray;
use Exception;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'file_id' => 'file_id',
            'file_unique_id' => 'file_unique_id',
            'width' => 10,
            'height' => 11,
            'duration' => 12,
            'thumbnail' => [
                'file_id' => 'thumbnail_file_id',
                'file_unique_id' => 'thumbnail_file_unique_id',
                'width' => 13,
                'height' => 14,
            ],
            'file_name' => 'file_name',
            'mime_type' => 'mime_type',
            'file_size' => 15
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
            $object->thumbnail->fileId->getValue()
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
