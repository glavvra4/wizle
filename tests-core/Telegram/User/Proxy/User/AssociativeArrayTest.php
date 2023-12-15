<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\User\Proxy\User;

use Core\Telegram\User\Proxy\User\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValue()
    {
        $object = new AssociativeArray([
            'id' => 123123123,
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
        ]);

        $this->assertEquals(
            123123123,
            $object->getId()->getValue()
        );

        $this->assertEquals(
            false,
            $object->getIsBot()->getValue()
        );

        $this->assertEquals(
            'first_name',
            $object->getFirstName()->getValue()
        );

        $this->assertEquals(
            'last_name',
            $object->getLastName()->getValue()
        );

        $this->assertEquals(
            'username',
            $object->getUsername()->getValue()
        );

        $this->assertEquals(
            'ru',
            $object->getLanguageCode()->getValue()
        );

        $this->assertEquals(
            true,
            $object->getIsPremium()->getValue()
        );

        $this->assertEquals(
            true,
            $object->getAddedToAttachmentMenu()->getValue()
        );

        $this->assertEquals(
            true,
            $object->getCanJoinGroups()->getValue()
        );

        $this->assertEquals(
            true,
            $object->getCanReadAllGroupMessages()->getValue()
        );

        $this->assertEquals(
            true,
            $object->getSupportsInlineQueries()->getValue()
        );
    }
}
