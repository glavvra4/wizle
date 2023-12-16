<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Proxy\LabeledPrices;

use Core\Currency\Entity\Currency;
use Core\Telegram\Payments\Entity\LabeledPrice;
use Core\Telegram\Payments\Proxy\LabeledPrices\IndexedArray;
use InvalidArgumentException;
use LogicException;
use PHPUnit\Framework\TestCase;

class IndexedArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new IndexedArray([
            [
                'label' => 'label1',
                'amount' => 10,
            ],
            [
                'label' => 'label2',
                'amount' => 11,
            ]
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
        new IndexedArray(['invalidValue']);
    }

    public function testArrayAccessSetError()
    {
        $object = new IndexedArray([]);

        $this->expectException(LogicException::class);
        $object[0] = new LabeledPrice(
            new LabeledPrice\Label('label1'),
            new Currency\Amount(10)
        );
    }

    public function testArrayAccessUnsetError()
    {
        $object = new IndexedArray([
            [
                'label' => 'label1',
                'amount' => 10,
            ],
        ]);

        $this->expectException(LogicException::class);
        unset($object[0]);
    }
}
