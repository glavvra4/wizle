<?php

declare(strict_types=1);

namespace Core\Tests\Currency\Adapter\Currency;

use Core\Currency\Adapter\Currency\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValue()
    {
        $object = new AssociativeArray([
            'code' => 'AED',
            'title' => 'United Arab Emirates Dirham',
            'symbol' => 'AED',
            'native' => 'د.إ.‏',
            'thousands_separator' => ',',
            'decimal_separator' => '.',
            'symbol_left' => true,
            'space_between' => true,
            'exponent' => 2
        ]);

        $this->assertEquals(
            'AED',
            $object->getCode()->getValue()
        );

        $this->assertEquals(
            'United Arab Emirates Dirham',
            $object->getTitle()->getValue()
        );

        $this->assertEquals(
            'AED',
            $object->getSymbol()->getValue()
        );

        $this->assertEquals(
            'د.إ.‏',
            $object->getNative()->getValue()
        );

        $this->assertEquals(
            ',',
            $object->getThousandsSeparator()->getValue()
        );

        $this->assertEquals(
            '.',
            $object->getDecimalSeparator()->getValue()
        );

        $this->assertEquals(
            true,
            $object->getSymbolLeft()->getValue()
        );

        $this->assertEquals(
            true,
            $object->getSpaceBetween()->getValue()
        );

        $this->assertEquals(
            2,
            $object->getExponent()->getValue()
        );
    }
}
