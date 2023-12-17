<?php

declare(strict_types=1);

namespace Core\Tests\Common\Entity;

use Core\Common\Entity\FloatValueObject;
use PHPUnit\Framework\TestCase;

class FloatValueObjectTest extends TestCase
{
    public function testGetValue()
    {
        $stub = $this->getMockForAbstractClass(FloatValueObject::class, [10.10]);

        $this->assertEquals(
            10.10,
            $stub->getValue()
        );
    }
}
