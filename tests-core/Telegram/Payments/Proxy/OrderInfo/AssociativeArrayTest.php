<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Proxy\OrderInfo;

use Core\Telegram\Payments\Proxy\OrderInfo\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'name' => 'name',
            'phone_number' => 'phone_number',
            'email' => 'email',
            'shipping_address' => [
                'country_code' => 'shipping_address_country_code',
                'state' => 'shipping_address_state',
                'city' => 'shipping_address_city',
                'street_line1' => 'shipping_address_street_line1',
                'street_line2' => 'shipping_address_street_line2',
                'post_code' => 'shipping_address_post_code',
            ],
        ]);

        $this->assertEquals(
            'name',
            $object->name->getValue()
        );

        $this->assertEquals(
            'phone_number',
            $object->phoneNumber->getValue()
        );

        $this->assertEquals(
            'email',
            $object->email->getValue()
        );

        $this->assertEquals(
            'shipping_address_country_code',
            $object->shippingAddress->countryCode->getValue()
        );
    }
}
