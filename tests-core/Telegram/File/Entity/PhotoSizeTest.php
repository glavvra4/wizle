<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity;

use Core\Telegram\File\Entity\PhotoSize;
use Core\Telegram\File\Entity\File;
use PHPUnit\Framework\TestCase;

class PhotoSizeTest extends TestCase
{
    public function testGetValues()
    {
        $object = new PhotoSize(
            new File\Id('file_id'),
            new File\UniqueId('file_unique_id'),
            new File\Dimension(10),
            new File\Dimension(11),
            new File\Size(12)
        );

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
            11,
            $object->getHeight()->getValue()
        );

        $this->assertEquals(
            12,
            $object->getFileSize()->getValue()
        );
    }
}
