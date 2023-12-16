<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity;

use Core\Telegram\File\Entity\{File};
use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    public function testGetValues()
    {
        $object = new File(
            new File\Id('file_id'),
            new File\UniqueId('file_unique_id'),
            new File\Size(10),
            new File\Path('file_path')
        );

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
