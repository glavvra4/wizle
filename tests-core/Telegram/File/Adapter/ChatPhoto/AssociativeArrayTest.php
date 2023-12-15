<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Adapter\ChatPhoto;

use Core\Telegram\File\Adapter\ChatPhoto\AssociativeArray;
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
            $object->getSmallFileId()->getValue()
        );

        $this->assertEquals(
            'small_file_unique_id',
            $object->getSmallFileUniqueId()->getValue()
        );

        $this->assertEquals(
            'big_file_id',
            $object->getBigFileId()->getValue()
        );

        $this->assertEquals(
            'big_file_unique_id',
            $object->getBigFileUniqueId()->getValue()
        );
    }
}
