<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Sticker\Entity;

use Core\Telegram\Sticker\Entity\MaskPosition;
use PHPUnit\Framework\TestCase;

class MaskPositionTest extends TestCase
{
    public function testGetValues()
    {
        $object = new MaskPosition(
            new MaskPosition\Point('point'),
            new MaskPosition\XShift(10),
            new MaskPosition\YShift(11),
            new MaskPosition\Scale(12)
        );

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
