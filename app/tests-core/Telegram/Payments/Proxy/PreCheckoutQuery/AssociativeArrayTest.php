<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Proxy\PreCheckoutQuery;

use Core\Telegram\Payments\Proxy\PreCheckoutQuery\AssociativeArray;
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
            'currency' => 'RUB',
            'total_amount' => 11,
            'invoice_payload' => 'invoice_payload',
            'shipping_option_id' => 'shipping_option_id',
            'order_info' => [
                'name' => 'order_info_name'
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
            'RUB',
            $object->currency->getValue()
        );

        $this->assertEquals(
            11,
            $object->totalAmount->getValue()
        );

        $this->assertEquals(
            'invoice_payload',
            $object->invoicePayload->getValue()
        );

        $this->assertEquals(
            'shipping_option_id',
            $object->shippingOptionId->getValue()
        );

        $this->assertEquals(
            'order_info_name',
            $object->orderInfo->name->getValue()
        );
    }
}
