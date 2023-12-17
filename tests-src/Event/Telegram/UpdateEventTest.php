<?php

declare(strict_types=1);

namespace App\Tests\Event\Telegram;

use App\Event\Telegram\UpdateEvent;
use Core\Telegram\Update\Entity\Update;
use PHPUnit\Framework\TestCase;

class UpdateEventTest extends TestCase
{
    public function testGetUpdate()
    {
        $event = new UpdateEvent(
            new Update(
                new Update\Id(10)
            )
        );

        $this->assertEquals(
            10,
            $event->getUpdate()->id->getValue()
        );
    }
}
