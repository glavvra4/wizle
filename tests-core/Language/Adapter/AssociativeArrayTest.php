<?php

declare(strict_types=1);

namespace Core\Tests\Language\Adapter;

use Core\Common\Adapter\InvalidAdapterDataException;
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

    public function testEmptyMandatoryKeyException()
    {
        $this->expectException(InvalidAdapterDataException::class);
        new AssociativeArray([
            'title' => 'Arabic'
        ]);
    }

    public function testInvalidValueTypeException()
    {
        $this->expectException(InvalidAdapterDataException::class);
        new AssociativeArray([
            'title' => 'Arabic',
            'subtag' => 0
        ]);
    }
}
