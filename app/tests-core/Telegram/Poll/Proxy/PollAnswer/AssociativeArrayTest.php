<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Proxy\PollAnswer;

use Core\Telegram\Poll\Proxy\PollAnswer\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'poll_id' => 'poll_id',
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
            'option_ids' => [
                11
            ]
        ]);

        $this->assertEquals(
            'poll_id',
            $object->pollId->getValue()
        );

        $this->assertEquals(
            10,
            $object->user->id->getValue()
        );

        $this->assertEquals(
            11,
            $object->optionIds[0]->getValue()
        );
    }
}
