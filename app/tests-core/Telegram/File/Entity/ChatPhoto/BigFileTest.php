<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity\ChatPhoto;

use Core\Telegram\File\Entity\{ChatPhoto\BigFile, File};
use PHPUnit\Framework\TestCase;

class BigFileTest extends TestCase
{
    public function testGetValues()
    {
        $object = new BigFile(
            new File\Id('file_id'),
            new File\UniqueId('file_unique_id')
        );

        $this->assertEquals(
            'file_id',
            $object->fileId->getValue()
        );

        $this->assertEquals(
            'file_unique_id',
            $object->fileUniqueId->getValue()
        );
    }
}
