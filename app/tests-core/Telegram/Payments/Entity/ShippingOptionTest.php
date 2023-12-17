<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Entity;

use Core\Currency\Entity\Currency;
use Core\Telegram\Payments\Entity\LabeledPrice;
use Core\Telegram\Payments\Entity\LabeledPrices;
use Core\Telegram\Payments\Entity\ShippingOption;
use PHPUnit\Framework\TestCase;

class ShippingOptionTest extends TestCase
{
    public function testGetValues()
    {
        $object = new ShippingOption(
            new ShippingOption\Id('id'),
            new ShippingOption\Title('title'),
            new LabeledPrices([
                new LabeledPrice(
                    new LabeledPrice\Label('prices_label1'),
                    new Currency\Amount(10)
                ),
            ])
        );

        $this->assertEquals(
            'id',
            $object->id->getValue()
        );

        $this->assertEquals(
            'title',
            $object->title->getValue()
        );

        $this->assertEquals(
            'prices_label1',
            $object->prices[0]->label->getValue()
        );
    }
}
