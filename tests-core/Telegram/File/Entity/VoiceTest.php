<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity;

use Core\Telegram\File\Entity\{File, Voice};
use PHPUnit\Framework\TestCase;

class VoiceTest extends TestCase
{
    public function testGetValues()
    {
        $object = new Voice(
            new File\Id('file_id'),
            new File\UniqueId('file_unique_id'),
            new File\Duration(10),
            new File\MimeType('mime_type'),
            new File\Size(11),
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
