<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Proxy\SuccessfulPayment;

use Core\Telegram\Payments\Proxy\SuccessfulPayment\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'currency' => 'RUB',
            'total_amount' => 10,
            'invoice_payload' => 'invoice_payload',
            'telegram_payment_charge_id' => 'telegram_payment_charge_id',
            'provider_payment_charge_id' => 'provider_payment_charge_id',
            'shipping_option_id' => 'shipping_option_id',
            'order_info' => [
                'name' => 'order_info_name'
            ],
        ]);

        $this->assertEquals(
            'RUB',
            $object->currency->getValue()
        );

        $this->assertEquals(
            10,
            $object->totalAmount->getValue()
        );

        $this->assertEquals(
            'invoice_payload',
            $object->invoicePayload->getValue()
        );

        $this->assertEquals(
            'telegram_payment_charge_id',
            $object->telegramPaymentChargeId->getValue()
        );

        $this->assertEquals(
            'provider_payment_charge_id',
            $object->providerPaymentChargeId->getValue()
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
