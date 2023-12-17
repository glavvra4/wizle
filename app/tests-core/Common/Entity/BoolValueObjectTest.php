<?php

declare(strict_types=1);

namespace Core\Tests\Common\Entity;

use Core\Common\Entity\BoolValueObject;
use PHPUnit\Framework\TestCase;

class BoolValueObjectTest extends TestCase
{
    public function testGetValue()
    {
        $stub = $this->getMockForAbstractClass(BoolValueObject::class, [true]);

        $this->assertTrue(
            $stub->getValue()
        );
    }
}
