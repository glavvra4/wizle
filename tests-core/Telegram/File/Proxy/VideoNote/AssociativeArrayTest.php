<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Proxy\VideoNote;

use Core\Telegram\File\Proxy\VideoNote\AssociativeArray;
use Exception;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'file_id' => 'file_id',
            'file_unique_id' => 'file_unique_id',
            'length' => 10,
            'duration' => 11,
            'thumbnail' => [
                'file_id' => 'thumbnail_file_id',
                'file_unique_id' => 'thumbnail_file_unique_id',
                'width' => 12,
                'height' => 13,
            ],
            'file_size' => 14
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
            $object->length->getValue()
        );

        $this->assertEquals(
            11,
            $object->duration->getValue()
        );

        $this->assertEquals(
            'thumbnail_file_id',
            $object->thumbnail->fileId->getValue()
        );

        $this->assertEquals(
            14,
            $object->fileSize->getValue()
        );
    }
}
