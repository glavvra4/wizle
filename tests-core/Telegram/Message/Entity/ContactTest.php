<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Message\Entity;

use Core\Language\Entity\Language;
use Core\Telegram\Message\Entity\Contact;
use Core\Telegram\Message\Entity\MessageEntity;
use Core\Telegram\User\Entity\User;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    public function testGetValues()
    {
        $object = new Contact(
            new Contact\PhoneNumber('phone_number'),
            new Contact\FirstName('first_name'),
            new Contact\LastName('last_name'),
            new User\Id(10),
            new Contact\VCard('vcard')
        );

        $this->assertEquals(
            'phone_number',
            $object->phoneNumber->getValue()
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
            10,
            $object->userId->getValue()
        );

        $this->assertEquals(
            'vcard',
            $object->vCard->getValue()
        );
    }
}
