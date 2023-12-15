<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Message\Entity;

use Core\Telegram\Message\Entity\MessageEntity;
use Core\Telegram\User\Entity\User;
use PHPUnit\Framework\TestCase;

class MessageEntityTest extends TestCase
{
    public function testGetValues()
    {
        $userStub = $this->createStub(User::class);
        $userStub->method('getId')
            ->willReturn(new User\Id(10));

        $object = new MessageEntity(
            new MessageEntity\Type('mention'),
            new MessageEntity\Offset(10),
            new MessageEntity\Length(11),
            null,
            $userStub,
            null,
            null
        );

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

        $this->assertNull(
            $object->getUrl()
        );

        $this->assertEquals(
            10,
            $object->getUser()->getId()->getValue()
        );

        $this->assertNull(
            $object->getLanguage()
        );

        $this->assertNull(
            $object->getCustomEmojiId()
        );
    }
}
