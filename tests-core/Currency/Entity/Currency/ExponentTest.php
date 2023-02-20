<?php

declare(strict_types=1);

namespace Core\Tests\Currency\Entity\Currency;

use Core\Currency\Entity\Currency\Code;
use Core\Currency\Entity\Currency\Exception\InvalidCodeException;
use Core\Currency\Entity\Currency\Exception\InvalidExponentException;
use Core\Currency\Entity\Currency\Exponent;
use PHPUnit\Framework\TestCase;

class ExponentTest extends TestCase
{
    public function testGetValue()
    {
        $object = new Exponent(2);

        $this->assertEquals(
            2,
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidExponentException::class);
        new Exponent(-1);
    }
}
