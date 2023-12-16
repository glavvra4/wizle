<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Entity;

use Core\Currency\Entity\Currency;
use Core\Telegram\Payments\Entity\Invoice;
use Core\Telegram\Payments\Entity\LabeledPrice;
use Core\Telegram\Payments\Entity\LabeledPrices;
use Core\Telegram\Payments\Entity\OrderInfo;
use Core\Telegram\Payments\Entity\ShippingOption;
use Core\Telegram\Payments\Entity\SuccessfulPayment;
use PHPUnit\Framework\TestCase;

class SuccessfulPaymentTest extends TestCase
{
    public function testGetValues()
    {
        $object = new SuccessfulPayment(
            new Currency\Code('RUB'),
            new Currency\Amount(10),
            new Invoice\Payload('invoice_payload'),
            new SuccessfulPayment\TelegramPaymentChargeId('telegram_payment_charge_id'),
            new SuccessfulPayment\ProviderPaymentChargeId('provider_payment_charge_id'),
            new ShippingOption\Id('shipping_option_id'),
            new OrderInfo(
                new OrderInfo\Name('order_info_name')
            )
        );

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
