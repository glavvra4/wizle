<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Message\Proxy\Contact;

use Core\Telegram\Message\Proxy\Contact\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'phone_number' => 'phone_number',
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'user_id' => 10,
            'vcard' => 'vcard'
        ]);

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
