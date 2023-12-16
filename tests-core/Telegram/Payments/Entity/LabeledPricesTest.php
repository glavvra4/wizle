<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Entity;

use Core\Currency\Entity\Currency;
use Core\Telegram\Payments\Entity\LabeledPrice;
use Core\Telegram\Payments\Entity\LabeledPrices;
use InvalidArgumentException;
use LogicException;
use PHPUnit\Framework\TestCase;

class LabeledPricesTest extends TestCase
{
    public function testGetValues()
    {
        $object = new LabeledPrices([
            new LabeledPrice(
                new LabeledPrice\Label('label1'),
                new Currency\Amount(10)
            ),
            new LabeledPrice(
                new LabeledPrice\Label('label2'),
                new Currency\Amount(11)
            ),
        ]);

        // Testing ArrayAccess

        $this->assertEquals(
            'label1',
            $object[0]->label->getValue()
        );

        $this->assertEquals(
            'label2',
            $object[1]->label->getValue()
        );

        // Testing Iterator

        foreach ($object as $key => $item) {
            $this->assertInstanceOf(
                LabeledPrice::class,
                $item
            );

            $this->assertIsInt($key);
        }
    }

    public function testInvalidArgumentException()
    {
        $this->expectException(InvalidArgumentException::class);

        /** @noinspection PhpParamsInspection */
        new LabeledPrices(['invalidValue']);
    }

    public function testArrayAccessSetError()
    {
        $object = new LabeledPrices([]);

        $this->expectException(LogicException::class);
        $object[0] = new LabeledPrice(
            new LabeledPrice\Label('label1'),
            new Currency\Amount(10)
        );
    }

    public function testArrayAccessUnsetError()
    {
        $object = new LabeledPrices([
            new LabeledPrice(
                new LabeledPrice\Label('label1'),
                new Currency\Amount(10)
            ),
        ]);

        $this->expectException(LogicException::class);
        unset($object[0]);
    }
}
