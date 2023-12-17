<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Proxy\ShippingAddress;

use Core\Telegram\Payments\Proxy\ShippingAddress\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'country_code' => 'country_code',
            'state' => 'state',
            'city' => 'city',
            'street_line1' => 'street_line1',
            'street_line2' => 'street_line2',
            'post_code' => 'post_code',
        ]);

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
