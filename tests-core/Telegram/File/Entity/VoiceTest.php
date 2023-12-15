<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity;

use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\Voice;
use DateInterval;
use PHPUnit\Framework\TestCase;

class VoiceTest extends TestCase
{
    public function testGetValues()
    {
        $object = new Voice(
            new File\Id('file_id'),
            new File\UniqueId('file_unique_id'),
            new File\Duration(new DateInterval('PT10S')),
            new File\MimeType('mime_type'),
            new File\Size(11),
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
