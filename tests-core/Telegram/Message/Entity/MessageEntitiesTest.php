<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Message\Entity;

use Core\Telegram\Message\Entity\MessageEntities;
use Core\Telegram\Message\Entity\MessageEntity;
use Core\Telegram\Message\Entity\MessageEntityInterface;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class MessageEntitiesTest extends TestCase
{
    public function testGetValues()
    {
        $messageEntityStub1 = $this->createStub(MessageEntity::class);
        $messageEntityStub1->method('getType')
            ->willReturn(new MessageEntity\Type('mention'));

        $messageEntityStub2 = $this->createStub(MessageEntity::class);
        $messageEntityStub2->method('getType')
            ->willReturn(new MessageEntity\Type('hashtag'));

        $object = new MessageEntities([$messageEntityStub1, $messageEntityStub2]);

        // Testing ArrayAccess

        $this->assertEquals(
            'mention',
            $object[0]->getType()->getValue()
        );

        $this->assertEquals(
            'hashtag',
            $object[1]->getType()->getValue()
        );

        // Testing Iterator

        foreach ($object as $key => $item) {
            $this->assertInstanceOf(
                MessageEntityInterface::class,
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

        $this->expectError();
        $object[0] = $this->createStub(MessageEntity::class);
    }

    public function testArrayAccessUnsetError()
    {
        $object = new MessageEntities([
            $this->createStub(MessageEntity::class)
        ]);

        $this->expectError();
        unset($object[0]);
    }
}
