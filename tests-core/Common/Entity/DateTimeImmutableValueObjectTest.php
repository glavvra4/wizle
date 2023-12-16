<?php

declare(strict_types=1);

namespace Core\Tests\Common\Entity;

use Core\Common\Entity\TimeValueObject;
use PHPUnit\Framework\TestCase;

class DateTimeImmutableValueObjectTest extends TestCase
{
    public function testGetValue()
    {
        $stub = $this->getMockForAbstractClass(TimeValueObject::class, [1677337596]);

        $this->assertEquals(
            1677337596,
            $stub->getValue()
        );
    }
}
