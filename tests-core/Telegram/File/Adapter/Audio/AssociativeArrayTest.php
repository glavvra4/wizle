<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Adapter\Audio;

use Core\Telegram\File\Adapter\Audio\AssociativeArray;
use Exception;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    /**
     * @throws Exception
     */
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
                'file_id' => 'thumbnail_stub_file_id',
                'file_unique_id' => 'thumbnail_stub_file_unique_id',
                'width' => 10,
                'height' => 11,
                'file_size' => 12
            ]
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
