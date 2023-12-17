<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Entity;

use Core\Currency\Entity\Currency;
use Core\Telegram\Payments\Entity\LabeledPrice;
use Core\Telegram\Payments\Entity\ShippingAddress;
use PHPUnit\Framework\TestCase;

class ShippingAddressTest extends TestCase
{
    public function testGetValues()
    {
        $object = new ShippingAddress(
            new ShippingAddress\CountryCode('country_code'),
            new ShippingAddress\State('state'),
            new ShippingAddress\City('city'),
            new ShippingAddress\StreetLine1('street_line1'),
            new ShippingAddress\StreetLine2('street_line2'),
            new ShippingAddress\PostCode('post_code')
        );

        $this->assertEquals(
            'country_code',
            $object->countryCode->getValue()
        );

        $this->assertEquals(
            'state',
            $object->state->getValue()
        );

        $this->assertEquals(
            'city',
            $object->city->getValue()
        );

        $this->assertEquals(
            'street_line1',
            $object->streetLine1->getValue()
        );

        $this->assertEquals(
            'street_line2',
            $object->streetLine2->getValue()
        );

        $this->assertEquals(
            'post_code',
            $object->postCode->getValue()
        );
    }
}
