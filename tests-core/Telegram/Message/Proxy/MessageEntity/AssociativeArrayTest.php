<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Message\Proxy\MessageEntity;

use Core\Telegram\Message\Proxy\MessageEntity\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'type' => 'mention',
            'offset' => 10,
            'length' => 11,
            'url' => 'url',
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
            ],
            'language' => 'language',
            'custom_emoji_id' => 'custom_emoji_id'
        ]);

        $this->assertEquals(
            'mention',
            $object->getType()->getValue()
        );

        $this->assertEquals(
            10,
            $object->getOffset()->getValue()
        );

        $this->assertEquals(
            11,
            $object->getLength()->getValue()
        );

        $this->assertEquals(
            'url',
            $object->getUrl()->getValue()
        );

        $this->assertEquals(
            10,
            $object->getUser()->getId()->getValue()
        );

        $this->assertEquals(
            'language',
            $object->getLanguage()->getValue()
        );

        $this->assertEquals(
            'custom_emoji_id',
            $object->getCustomEmojiId()->getValue()
        );
    }
}
