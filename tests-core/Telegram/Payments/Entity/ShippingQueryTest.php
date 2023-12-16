<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Entity;

use Core\Telegram\Payments\Entity\Invoice;
use Core\Telegram\Payments\Entity\ShippingAddress;
use Core\Telegram\Payments\Entity\ShippingQuery;
use Core\Telegram\User\Entity\User;
use PHPUnit\Framework\TestCase;

class ShippingQueryTest extends TestCase
{
    public function testGetValues()
    {
        $object = new ShippingQuery(
            new ShippingQuery\Id('id'),
            new User(
                new User\Id(10),
                new User\IsBot(false),
                new User\FirstName('from_first_name')
            ),
            new Invoice\Payload('invoice_payload'),
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
            'id',
            $object->id->getValue()
        );

        $this->assertEquals(
            10,
            $object->from->id->getValue()
        );

        $this->assertEquals(
            'invoice_payload',
            $object->invoicePayload->getValue()
        );

        $this->assertEquals(
            'shipping_address_country_code',
            $object->shippingAddress->countryCode->getValue()
        );
    }
}
