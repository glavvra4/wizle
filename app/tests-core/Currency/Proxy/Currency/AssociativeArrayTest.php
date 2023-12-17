<?php

declare(strict_types=1);

namespace Core\Tests\Currency\Proxy\Currency;

use Core\Currency\Proxy\Currency\AssociativeArray;
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
