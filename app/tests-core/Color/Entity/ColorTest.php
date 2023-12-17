<?php

declare(strict_types=1);

namespace Core\Tests\Color\Entity;

use Core\Color\Entity\Color;
use Core\Color\Entity\Exception\InvalidColorException;
use PHPUnit\Framework\TestCase;

class ColorTest extends TestCase
{
    public function testValidData()
    {
        $color = new Color(0xff0f00);

        $this->assertEquals(0xff0f00, $color->getValue());
        $this->assertEquals(0xff, $color->getRed());
        $this->assertEquals(0x0f, $color->getGreen());
        $this->assertEquals(0x00, $color->getBlue());
    }

    public function testInvalidData()
    {
        $this->expectException(InvalidColorException::class);
        new Color(0x1000000);
    }
}
