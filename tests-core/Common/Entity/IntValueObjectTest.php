<?php

declare(strict_types=1);

namespace Core\Tests\Common\Entity;

use Core\Common\Entity\IntValueObject;
use PHPUnit\Framework\TestCase;

class IntValueObjectTest extends TestCase
{
    public function testGetValue()
    {
        $stub = $this->getMockForAbstractClass(IntValueObject::class, [10]);

        $this->assertEquals(
            10,
            $stub->getValue()
        );
    }
}
