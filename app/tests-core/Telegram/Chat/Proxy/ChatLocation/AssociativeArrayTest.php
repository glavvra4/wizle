<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Chat\Proxy\ChatLocation;

use Core\Telegram\Chat\Proxy\ChatLocation\AssociativeArray;
use Exception;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'location' => [
                'longitude' => 10,
                'latitude' => 11
            ],
            'address' => 'address'
        ]);

        $this->assertEquals(
            10,
            $object->location->longitude->getValue()
        );

        $this->assertEquals(
            'address',
            $object->address->getValue()
        );
    }
}
