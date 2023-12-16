<?php

declare(strict_types=1);

namespace Core\Tests\Currency\Entity\Currency;

use Core\Currency\Entity\Currency\Exception\InvalidAmountException;
use Core\Currency\Entity\Currency\Amount;
use PHPUnit\Framework\TestCase;

class AmountTest extends TestCase
{
    public function testGetValue()
    {
        $object = new Amount(2);

        $this->assertEquals(
            2,
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidAmountException::class);
        new Amount(-1);
    }
}
