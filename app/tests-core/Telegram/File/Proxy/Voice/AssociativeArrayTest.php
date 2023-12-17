<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Proxy\Voice;

use Core\Telegram\File\Proxy\Voice\AssociativeArray;
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
            'mime_type' => 'mime_type',
            'file_size' => 11
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
            'mime_type',
            $object->mimeType->getValue()
        );

        $this->assertEquals(
            11,
            $object->fileSize->getValue()
        );
    }
}
