<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Adapter\Document;

use Core\Telegram\File\Adapter\Document\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'file_id' => 'file_id',
            'file_unique_id' => 'file_unique_id',
            'thumbnail' => [
                'file_id' => 'thumbnail_stub_file_id',
                'file_unique_id' => 'thumbnail_stub_file_unique_id',
                'width' => 10,
                'height' => 11,
                'file_size' => 12
            ],
            'file_name' => 'file_name',
            'mime_type' => 'mime_type',
            'file_size' => 10

        ]);

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
