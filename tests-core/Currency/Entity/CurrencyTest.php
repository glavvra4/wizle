<?php

declare(strict_types=1);

namespace Core\Tests\Currency\Entity;

use Core\Currency\Entity\Currency;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function testGetValue()
    {
        $object = new Currency(
            new Currency\Code('AED'),
            new Currency\Title('United Arab Emirates Dirham'),
            new Currency\Symbol('AED'),
            new Currency\Native('د.إ.‏'),
            new Currency\ThousandsSeparator(','),
            new Currency\DecimalSeparator('.'),
            new Currency\SymbolLeft(true),
            new Currency\SpaceBetween(true),
            new Currency\Exponent(2)
        );

        $this->assertEquals(
            'AED',
            $object->code->getValue()
        );

        $this->assertEquals(
            'United Arab Emirates Dirham',
            $object->title->getValue()
        );

        $this->assertEquals(
            'AED',
            $object->symbol->getValue()
        );

        $this->assertEquals(
            'د.إ.‏',
            $object->native->getValue()
        );

        $this->assertEquals(
            ',',
            $object->thousandsSeparator->getValue()
        );

        $this->assertEquals(
            '.',
            $object->decimalSeparator->getValue()
        );

        $this->assertEquals(
            true,
            $object->symbolLeft->getValue()
        );

        $this->assertEquals(
            true,
            $object->spaceBetween->getValue()
        );

        $this->assertEquals(
            2,
            $object->exponent->getValue()
        );
    }
}
