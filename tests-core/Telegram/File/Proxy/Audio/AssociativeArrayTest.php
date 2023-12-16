<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Proxy\Audio;

use Core\Telegram\File\Proxy\Audio\AssociativeArray;
use Exception;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'file_id' => 'file_id',
            'file_unique_id' => 'file_unique_id',
            'duration' => 10,
            'performer' => 'performer',
            'title' => 'title',
            'file_name' => 'file_name',
            'mime_type' => 'mime_type',
            'file_size' => 11,
            'thumbnail' => [
                'file_id' => 'thumbnail_file_id',
                'file_unique_id' => 'thumbnail_file_unique_id',
                'width' => 12,
                'height' => 13,
            ]
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
