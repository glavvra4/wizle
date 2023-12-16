<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Proxy\PhotoSize;

use Core\Telegram\File\Proxy\PhotoSize\AssociativeArray;
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
            'file_size' => 12
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
            $object->fileSize->getValue()
        );
    }
}
