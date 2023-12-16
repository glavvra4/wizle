<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Chat\Entity;

use Core\Telegram\Chat\Entity\ChatLocation;
use Core\Telegram\Location\Entity\Location;
use PHPUnit\Framework\TestCase;

class ChatLocationTest extends TestCase
{
    public function testGetValues()
    {
        $object = new ChatLocation(
            new Location(
                new Location\Longitude(10),
                new Location\Latitude(11),
            ),
            new ChatLocation\Address('Краснодар, ул. Пушкина, д. Колотушкина')
        );

        $this->assertEquals(
            10,
            $object->location->longitude->getValue()
        );

        $this->assertEquals(
            'Краснодар, ул. Пушкина, д. Колотушкина',
            $object->address->getValue()
        );
    }
}
