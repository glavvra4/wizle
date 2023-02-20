<?php

declare(strict_types=1);

namespace Core\Tests\Currency\Entity\Currency;

use Core\Currency\Entity\Currency\DecimalSeparator;
use Core\Currency\Entity\Currency\Exception\InvalidDecimalSeparatorException;
use PHPUnit\Framework\TestCase;

class DecimalSeparatorTest extends TestCase
{
    public function testGetValue()
    {
        $object = new DecimalSeparator(' ');

        $this->assertEquals(
            ' ',
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidDecimalSeparatorException::class);
        new DecimalSeparator('invalidValue');
    }
}
