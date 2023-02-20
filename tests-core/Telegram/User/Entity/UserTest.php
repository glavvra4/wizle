<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\User\Entity;

use Core\Language\Entity\Language;
use Core\Telegram\User\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetValues()
    {
        $object = new User(
            new User\Id(123123123),
            new User\IsBot(false),
            new User\FirstName('first_name'),
            new User\LastName('last_name'),
            new User\Username('username'),
            new Language\Subtag('ru'),
            new User\IsPremium(true),
            new User\AddedToAttachmentMenu(true),
            null,
            null,
            null,
        );

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
            null,
            $object->getCanJoinGroups()
        );

        $this->assertEquals(
            null,
            $object->getCanReadAllGroupMessages()
        );

        $this->assertEquals(
            null,
            $object->getSupportsInlineQueries()
        );
    }
}
