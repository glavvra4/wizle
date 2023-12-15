<?php

declare(strict_types=1);

namespace Core\Tests\Common\Entity;

use Core\Common\Entity\DateIntervalValueObject;
use DateInterval;
use PHPUnit\Framework\TestCase;

class DateIntervalValueObjectTest extends TestCase
{
    public function testGetValue()
    {
        $stub = $this->getMockForAbstractClass(DateIntervalValueObject::class, [new DateInterval('PT10S')]);

        $this->assertEquals(
            10,
            $stub->getValue()->s
        );
    }
}
