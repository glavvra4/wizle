<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Adapter\Voice;

use Core\Telegram\File\Adapter\Voice\AssociativeArray;
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
            'mime_type' => 'mime_type',
            'file_size' => 11
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
            'mime_type',
            $object->getMimeType()->getValue()
        );

        $this->assertEquals(
            11,
            $object->getFileSize()->getValue()
        );
    }
}
