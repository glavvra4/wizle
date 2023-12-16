<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity;

use Core\Telegram\File\Entity\{File, PhotoSize};
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
