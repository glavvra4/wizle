<?php

declare(strict_types=1);

namespace Core\Tests\Currency\Entity\Currency;

use Core\Currency\Entity\Currency\Exception\InvalidThousandsSeparatorException;
use Core\Currency\Entity\Currency\ThousandsSeparator;
use PHPUnit\Framework\TestCase;

class ThousandsSeparatorTest extends TestCase
{
    public function testGetValue()
    {
        $object = new ThousandsSeparator(' ');

        $this->assertEquals(
            ' ',
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidThousandsSeparatorException::class);
        new ThousandsSeparator('invalidValue');
    }
}
