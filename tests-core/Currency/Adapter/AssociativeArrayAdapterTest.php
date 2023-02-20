<?php

declare(strict_types=1);

namespace Core\Tests\Currency\Adapter;

use Core\Common\Adapter\InvalidAdapterDataException;
use Core\Currency\Adapter\AssociativeArrayAdapter;
use Core\Currency\Entity\Currency;
use PHPUnit\Framework\TestCase;

class AssociativeArrayAdapterTest extends TestCase
{
    public function testGetValue()
    {
        $object = new AssociativeArrayAdapter([
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

    public function testEmptyMandatoryKeyException()
    {
        $this->expectException(InvalidAdapterDataException::class);
        new AssociativeArrayAdapter([
            'title' => 'United Arab Emirates Dirham',
            'symbol' => 'AED',
            'native' => 'د.إ.‏',
            'thousands_separator' => ',',
            'decimal_separator' => '.',
            'symbol_left' => true,
            'space_between' => true,
            'exponent' => 2
        ]);
    }

    public function testInvalidValueTypeException()
    {
        $this->expectException(InvalidAdapterDataException::class);
        new AssociativeArrayAdapter([
            'code' => 'AED',
            'title' => 'United Arab Emirates Dirham',
            'symbol' => 'AED',
            'native' => 'د.إ.‏',
            'thousands_separator' => ',',
            'decimal_separator' => '.',
            'symbol_left' => true,
            'space_between' => true,
            'exponent' => 'invalidType'
        ]);
    }
}
