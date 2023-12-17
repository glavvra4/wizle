<?php

declare(strict_types=1);

namespace Core\Tests\Common\Entity;

use Core\Common\Entity\StringValueObject;
use PHPUnit\Framework\TestCase;

class StringValueObjectTest extends TestCase
{
    public function testGetValue()
    {
        $stub = $this->getMockForAbstractClass(StringValueObject::class, ['value']);

        $this->assertEquals(
            'value',
            $stub->getValue()
        );
    }
}
