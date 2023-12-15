<?php

declare(strict_types=1);

namespace Core\Tests\Language\Adapter\Language;

use Core\Language\Adapter\AssociativeArray;
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
            $object->getTitle()->getValue()
        );

        $this->assertEquals(
            'ar',
            $object->getSubtag()->getValue()
        );
    }
}
