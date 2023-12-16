<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Message\Entity;

use Core\Telegram\Message\Entity\Contact;
use Core\Telegram\Message\Entity\Dice;
use Core\Telegram\User\Entity\User;
use PHPUnit\Framework\TestCase;

class DiceTest extends TestCase
{
    public function testGetValues()
    {
        $object = new Dice(
            new Dice\Emoji('emoji'),
            new Dice\Value(10),
        );

        $this->assertEquals(
            'emoji',
            $object->emoji->getValue()
        );

        $this->assertEquals(
            10,
            $object->value->getValue()
        );
    }
}
