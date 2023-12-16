<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Sticker\Proxy\MakPosition;

use Core\Telegram\Sticker\Proxy\MaskPosition\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'point' => 'point',
            'x_shift' => 10,
            'y_shift' => 11,
            'scale' => 12,
        ]);

        $this->assertEquals(
            'point',
            $object->point->getValue()
        );

        $this->assertEquals(
            10,
            $object->xShift->getValue()
        );

        $this->assertEquals(
            11,
            $object->yShift->getValue()
        );

        $this->assertEquals(
            12,
            $object->scale->getValue()
        );
    }
}
