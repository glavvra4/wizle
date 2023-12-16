<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Proxy\ShippingQuery;

use Core\Telegram\Payments\Proxy\ShippingQuery\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'id' => 'id',
            'from' => [
                'id' => 10,
                'is_bot' => false,
                'first_name' => 'from_first_name'
            ],
            'invoice_payload' => 'invoice_payload',
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
