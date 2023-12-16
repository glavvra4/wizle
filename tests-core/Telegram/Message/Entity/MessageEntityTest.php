<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Message\Entity;

use Core\Language\Entity\Language;
use Core\Telegram\Message\Entity\MessageEntity;
use Core\Telegram\User\Entity\User;
use PHPUnit\Framework\TestCase;

class MessageEntityTest extends TestCase
{
    public function testGetValues()
    {
        $object = new MessageEntity(
            new MessageEntity\Type('mention'),
            new MessageEntity\Offset(10),
            new MessageEntity\Length(11),
            null,
            new User(
                new User\Id(123123123),
                new User\IsBot(false),
                new User\FirstName('first_name'),
                new User\LastName('last_name'),
                new User\Username('username'),
                new Language\Subtag('ru'),
                new User\IsPremium(true),
                new User\AddedToAttachmentMenu(true),
                new User\CanJoinGroups(true),
                new User\CanReadAllGroupMessages(true),
                new User\SupportsInlineQueries(true),
            ),
            null,
            null
        );

        $this->assertEquals(
            'mention',
            $object->type->getValue()
        );

        $this->assertEquals(
            10,
            $object->offset->getValue()
        );

        $this->assertEquals(
            11,
            $object->length->getValue()
        );

        $this->assertNull(
            $object->url
        );

        $this->assertEquals(
            123123123,
            $object->user->id->getValue()
        );

        $this->assertNull(
            $object->language
        );

        $this->assertNull(
            $object->customEmojiId
        );
    }
}
