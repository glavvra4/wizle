<?php

declare(strict_types=1);

namespace Core\Tests\Currency\Entity\Currency;

use Core\Currency\Entity\Currency\Code;
use Core\Currency\Entity\Currency\Exception\InvalidCodeException;
use PHPUnit\Framework\TestCase;

class CodeTest extends TestCase
{
    public function testGetValue()
    {
        $object = new Code('AED');

        $this->assertEquals(
            'AED',
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidCodeException::class);
        new Code('AE');
    }
}
