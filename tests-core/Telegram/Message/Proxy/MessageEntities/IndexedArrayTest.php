<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Message\Proxy\MessageEntities;

use Core\Telegram\Message\Entity\MessageEntity;
use Core\Telegram\Message\Proxy\MessageEntities\IndexedArray;
use InvalidArgumentException;
use LogicException;
use PHPUnit\Framework\TestCase;

class IndexedArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new IndexedArray([
            [
                'type' => 'mention',
                'offset' => 10,
                'length' => 11,
                'user' => [
                    'id' => 10,
                    'is_bot' => false,
                    'first_name' => 'first_name',
                    'last_name' => 'last_name',
                    'username' => 'username',
                    'language_code' => 'ru',
                    'is_premium' => true,
                    'added_to_attachment_menu' => true,
                    'can_join_groups' => true,
                    'can_read_all_group_messages' => true,
                    'supports_inline_queries' => true
                ]
            ],
            [
                'type' => 'hashtag',
                'offset' => 10,
                'length' => 11,
            ]
        ]);

        // Testing ArrayAccess

        $this->assertEquals(
            'mention',
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
        new IndexedArray(['invalidValue']);
    }

    public function testArrayAccessSetError()
    {
        $object = new IndexedArray([]);

        $this->expectException(LogicException::class);
        $object[0] = new MessageEntity(
            new MessageEntity\Type('pre'),
            new MessageEntity\Offset(10),
            new MessageEntity\Length(11),
            null,
            null,
            new MessageEntity\Language('php'),
            null
        );
    }

    public function testArrayAccessUnsetError()
    {
        $object = new IndexedArray([
            [
                'type' => 'hashtag',
                'offset' => 10,
                'length' => 11,
            ]
        ]);

        $this->expectException(LogicException::class);
        unset($object[0]);
    }
}
