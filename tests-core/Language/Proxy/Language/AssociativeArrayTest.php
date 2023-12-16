<?php

declare(strict_types=1);

namespace Core\Tests\Language\Proxy\Language;

use Core\Language\Proxy\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValue()
    {
        $object = new AssociativeArray([
            'title' => 'Arabic',
            'subtag' => 'ar'
        ]);

        $this->assertEquals(
            'Arabic',
            $object->title->getValue()
        );

        $this->assertEquals(
            'ar',
            $object->subtag->getValue()
        );
    }
}
