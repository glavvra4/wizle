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
            new User\Id(10),
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
        );

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
