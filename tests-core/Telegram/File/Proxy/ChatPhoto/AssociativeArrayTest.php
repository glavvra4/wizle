<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Proxy\ChatPhoto;

use Core\Telegram\File\Proxy\ChatPhoto\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'small_file_id' => 'small_file_id',
            'small_file_unique_id' => 'small_file_unique_id',
            'big_file_id' => 'big_file_id',
            'big_file_unique_id' => 'big_file_unique_id'
        ]);

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
