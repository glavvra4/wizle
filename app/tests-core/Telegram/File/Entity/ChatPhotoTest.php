<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity;

use Core\Telegram\File\Entity\{ChatPhoto, File};
use PHPUnit\Framework\TestCase;

class ChatPhotoTest extends TestCase
{
    public function testGetValues()
    {
        $object = new ChatPhoto(
            new File\Id('small_file_id'),
            new File\UniqueId('small_file_unique_id'),
            new File\Id('big_file_id'),
            new File\UniqueId('big_file_unique_id')
        );

        $this->assertEquals(
            'small_file_id',
            $object->smallFile->fileId->getValue()
        );

        $this->assertEquals(
            'small_file_unique_id',
            $object->smallFile->fileUniqueId->getValue()
        );

        $this->assertEquals(
            'big_file_id',
            $object->bigFile->fileId->getValue()
        );

        $this->assertEquals(
            'big_file_unique_id',
            $object->bigFile->fileUniqueId->getValue()
        );
    }
}
