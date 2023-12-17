<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Entity;

use Core\Currency\Entity\Currency;
use Core\Telegram\Payments\Entity\Invoice;
use Core\Telegram\Payments\Entity\LabeledPrice;
use Core\Telegram\Payments\Entity\LabeledPrices;
use Core\Telegram\Payments\Entity\ShippingOption;
use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase
{
    public function testGetValues()
    {
        $object = new Invoice(
            new Invoice\Title('title'),
            new Invoice\Description('description'),
            new Invoice\StartParameter('start_parameter'),
            new Currency\Code('RUB'),
            new Currency\Amount(10)
        );

        $this->assertEquals(
            'title',
            $object->title->getValue()
        );

        $this->assertEquals(
            'description',
            $object->description->getValue()
        );

        $this->assertEquals(
            'start_parameter',
            $object->startParameter->getValue()
        );

        $this->assertEquals(
            'RUB',
            $object->currency->getValue()
        );

        $this->assertEquals(
            10,
            $object->totalAmount->getValue()
        );
    }
}
