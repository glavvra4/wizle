<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Message\Proxy\Dice;

use Core\Telegram\Message\Proxy\Dice\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'emoji' => 'emoji',
            'value' => 10,
        ]);

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
