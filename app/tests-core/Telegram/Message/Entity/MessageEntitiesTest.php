<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Message\Entity;

use LogicException;
use Core\Telegram\Message\Entity\{MessageEntities, MessageEntity};
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class MessageEntitiesTest extends TestCase
{
    public function testGetValues()
    {
        $object = new MessageEntities([
            new MessageEntity(
                new MessageEntity\Type('pre'),
                new MessageEntity\Offset(10),
                new MessageEntity\Length(11),
            ),
            new MessageEntity(
                new MessageEntity\Type('hashtag'),
                new MessageEntity\Offset(10),
                new MessageEntity\Length(11),
            )
        ]);

        // Testing ArrayAccess

        $this->assertEquals(
            'pre',
            $object[0]->type->getValue()
        );

        $this->assertEquals(
            'hashtag',
            $object[1]->type->getValue()
        );

        // Testing Iterator

        foreach ($object as $key => $item) {
            $this->assertInstanceOf(
                MessageEntity::class,
                $item
            );

            $this->assertIsInt($key);
        }
    }

    public function testInvalidArgumentException()
    {
        $this->expectException(InvalidArgumentException::class);

        /** @noinspection PhpParamsInspection */
        new MessageEntities(['invalidValue']);
    }

    public function testArrayAccessSetError()
    {
        $object = new MessageEntities([]);

        $this->expectException(LogicException::class);
        $object[0] = new MessageEntity(
            new MessageEntity\Type('pre'),
            new MessageEntity\Offset(10),
            new MessageEntity\Length(11),
        );
    }

    public function testArrayAccessUnsetError()
    {
        $object = new MessageEntities([
            new MessageEntity(
                new MessageEntity\Type('pre'),
                new MessageEntity\Offset(10),
                new MessageEntity\Length(11),
            )
        ]);

        $this->expectException(LogicException::class);
        unset($object[0]);
    }
}
