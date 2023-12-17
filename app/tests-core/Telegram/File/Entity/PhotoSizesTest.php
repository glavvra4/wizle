<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\File\Entity;

use Core\Telegram\File\Entity\File\{
    Dimension,
    Id,
    UniqueId
};
use Core\Telegram\File\Entity\PhotoSize;
use Core\Telegram\File\Entity\PhotoSizes;
use Core\Telegram\Message\Entity\{MessageEntities, MessageEntity};
use InvalidArgumentException;
use LogicException;
use PHPUnit\Framework\TestCase;

class PhotoSizesTest extends TestCase
{
    public function testGetValues()
    {
        $object = new PhotoSizes([
            new PhotoSize(
                new Id('file_id_1'),
                new UniqueId('file_unique_id_1'),
                new Dimension(10),
                new Dimension(11)
            ),
            new PhotoSize(
                new Id('file_id_2'),
                new UniqueId('file_unique_id_2'),
                new Dimension(12),
                new Dimension(13)
            )
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
        new PhotoSizes(['invalidValue']);
    }

    public function testArrayAccessSetError()
    {
        $object = new PhotoSizes([]);

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
        $object = new PhotoSizes([
            new PhotoSize(
                new Id('file_id_1'),
                new UniqueId('file_unique_id_1'),
                new Dimension(10),
                new Dimension(11)
            ),
        ]);

        $this->expectException(LogicException::class);
        unset($object[0]);
    }
}
