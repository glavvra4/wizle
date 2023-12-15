<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Adapter\VideoNote;

use Core\Telegram\File\Adapter\VideoNote\AssociativeArray;
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
            'length' => 10,
            'duration' => 11,
            'thumbnail' => [
                'file_id' => 'thumbnail_stub_file_id',
                'file_unique_id' => 'thumbnail_stub_file_unique_id',
                'width' => 10,
                'height' => 11,
                'file_size' => 12
            ],
            'file_size' => 12
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
