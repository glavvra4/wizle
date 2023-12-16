<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Entity;

use Core\Telegram\Payments\Entity\OrderInfo;
use Core\Telegram\Payments\Entity\ShippingAddress;
use PHPUnit\Framework\TestCase;

class OrderInfoTest extends TestCase
{
    public function testGetValues()
    {
        $object = new OrderInfo(
            new OrderInfo\Name('name'),
            new OrderInfo\PhoneNumber('phone_number'),
            new OrderInfo\Email('email'),
            new ShippingAddress(
                new ShippingAddress\CountryCode('shipping_address_country_code'),
                new ShippingAddress\State('shipping_address_state'),
                new ShippingAddress\City('shipping_address_city'),
                new ShippingAddress\StreetLine1('shipping_address_street_line1'),
                new ShippingAddress\StreetLine2('shipping_address_street_line2'),
                new ShippingAddress\PostCode('shipping_address_post_code')
            )
        );

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
