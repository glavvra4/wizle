<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Entity;

use Core\Currency\Entity\Currency;
use Core\Telegram\Payments\Entity\Invoice;
use Core\Telegram\Payments\Entity\OrderInfo;
use Core\Telegram\Payments\Entity\PreCheckoutQuery;
use Core\Telegram\Payments\Entity\ShippingOption;
use Core\Telegram\User\Entity\User;
use PHPUnit\Framework\TestCase;

class PreCheckoutQueryTest extends TestCase
{
    public function testGetValues()
    {
        $object = new PreCheckoutQuery(
            new PreCheckoutQuery\Id('id'),
            new User(
                new User\Id(10),
                new User\IsBot(false),
                new User\FirstName('from_first_name')
            ),
            new Currency\Code('RUB'),
            new Currency\Amount(11),
            new Invoice\Payload('invoice_payload'),
            new ShippingOption\Id('shipping_option_id'),
            new OrderInfo(
                new OrderInfo\Name('order_info_name'),
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
