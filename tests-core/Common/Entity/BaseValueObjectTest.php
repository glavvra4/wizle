<?php

declare(strict_types=1);

namespace Core\Tests\Common\Entity;

use Core\Common\Entity\BaseValueObject;
use PHPUnit\Framework\TestCase;

class BaseValueObjectTest extends TestCase
{
    public function testGetValue()
    {
        $stub = $this->getMockForAbstractClass(BaseValueObject::class, ['value']);

        $this->assertEquals(
            'value',
            $stub->getValue()
        );
    }
}
