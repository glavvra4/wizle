<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Entity;

use Core\Telegram\File\Entity\{Animation, File, PhotoSize, PhotoSizes};
use Core\Currency\Entity\Currency;
use Core\Telegram\Game\Entity\Game;
use Core\Telegram\Payments\Entity\LabeledPrice;
use Core\Telegram\Message\Entity\{MessageEntities, MessageEntity};
use PHPUnit\Framework\TestCase;

class LabeledPriceTest extends TestCase
{
    public function testGetValues()
    {
        $object = new LabeledPrice(
            new LabeledPrice\Label('label'),
            new Currency\Amount(10)
        );

        $this->assertEquals(
            'label',
            $object->label->getValue()
        );

        $this->assertEquals(
            10,
            $object->amount->getValue()
        );
    }
}
