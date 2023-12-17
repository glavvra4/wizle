<?php

declare(strict_types=1);

namespace Core\Tests\Common\Entity;

use Core\Common\Entity\TimeIntervalValueObject;
use PHPUnit\Framework\TestCase;

class DateIntervalValueObjectTest extends TestCase
{
    public function testGetValue()
    {
        $stub = $this->getMockForAbstractClass(TimeIntervalValueObject::class, [10]);

        $this->assertEquals(
            10,
            $stub->getValue()
        );
    }
}
