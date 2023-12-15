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
        $locationStub = $this->createStub(Location::class);
        $locationStub->method('getLongitude')
            ->willReturn(new Location\Longitude(45.072314));

        $object = new ChatLocation(
            $locationStub,
            new ChatLocation\Address('Краснодар, ул. Пушкина, д. Колотушкина')
        );

        $this->assertEquals(
            45.072314,
            $object->getLocation()->getLongitude()->getValue()
        );

        $this->assertEquals(
            'Краснодар, ул. Пушкина, д. Колотушкина',
            $object->getAddress()->getValue()
        );
    }
}
