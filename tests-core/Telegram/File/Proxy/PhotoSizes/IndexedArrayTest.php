<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Proxy\PhotoSizes;

use Core\Telegram\File\Entity\File\Dimension;
use Core\Telegram\File\Entity\File\Id;
use Core\Telegram\File\Entity\File\UniqueId;
use Core\Telegram\File\Entity\PhotoSize;
use Core\Telegram\File\Proxy\PhotoSizes\IndexedArray;
use InvalidArgumentException;
use LogicException;
use PHPUnit\Framework\TestCase;

class IndexedArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new IndexedArray([
            [
                'file_id' => 'file_id_1',
                'file_unique_id' => 'file_unique_id_1',
                'width' => 10,
                'height' => 11,
            ],
            [
                'file_id' => 'file_id_2',
                'file_unique_id' => 'file_unique_id_2',
                'width' => 11,
                'height' => 12,
            ]
        ]);

        // Testing ArrayAccess

        $this->assertEquals(
            'file_id_1',
            $object[0]->fileId->getValue()
        );

        $this->assertEquals(
            'file_id_2',
            $object[1]->fileId->getValue()
        );

        // Testing Iterator

        foreach ($object as $key => $item) {
            $this->assertInstanceOf(
                PhotoSize::class,
                $item
            );

            $this->assertIsInt($key);
        }
    }

    public function testInvalidArgumentException()
    {
        $this->expectException(InvalidArgumentException::class);

        /** @noinspection PhpParamsInspection */
        new IndexedArray(['invalidValue']);
    }

    public function testArrayAccessSetError()
    {
        $object = new IndexedArray([]);

        $this->expectException(LogicException::class);
        $object[0] = new PhotoSize(
            new Id('file_id_1'),
            new UniqueId('file_unique_id_1'),
            new Dimension(10),
            new Dimension(11)
        );
    }

    public function testArrayAccessUnsetError()
    {
        $object = new IndexedArray([
            [
                'file_id' => 'file_id_1',
                'file_unique_id' => 'file_unique_id_1',
                'width' => 10,
                'height' => 11,
            ],
        ]);

        $this->expectException(LogicException::class);
        unset($object[0]);
    }
}
