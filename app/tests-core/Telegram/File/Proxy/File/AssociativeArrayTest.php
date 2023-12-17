<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Proxy\File;

use Core\Telegram\File\Proxy\File\AssociativeArray;
use Exception;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'file_id' => 'file_id',
            'file_unique_id' => 'file_unique_id',
            'file_size' => 10,
            'file_path' => 'file_path'
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
            $object->fileSize->getValue()
        );

        $this->assertEquals(
            'file_path',
            $object->filePath->getValue()
        );
    }
}
