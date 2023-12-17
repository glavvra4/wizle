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
        ]);

        $this->assertEquals(
            10,
            $object->id->getValue()
        );

        $this->assertEquals(
            false,
            $object->isBot->getValue()
        );

        $this->assertEquals(
            'first_name',
            $object->firstName->getValue()
        );

        $this->assertEquals(
            'last_name',
            $object->lastName->getValue()
        );

        $this->assertEquals(
            'username',
            $object->username->getValue()
        );

        $this->assertEquals(
            'ru',
            $object->languageCode->getValue()
        );

        $this->assertEquals(
            true,
            $object->isPremium->getValue()
        );

        $this->assertEquals(
            true,
            $object->addedToAttachmentMenu->getValue()
        );

        $this->assertEquals(
            true,
            $object->canJoinGroups->getValue()
        );

        $this->assertEquals(
            true,
            $object->canReadAllGroupMessages->getValue()
        );

        $this->assertEquals(
            true,
            $object->supportsInlineQueries->getValue()
        );
    }
}
