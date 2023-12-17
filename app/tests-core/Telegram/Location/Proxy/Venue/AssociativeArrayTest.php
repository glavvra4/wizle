<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Location\Proxy\Venue;

use Core\Telegram\Location\Proxy\Venue\AssociativeArray;
use Exception;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'location' => [
                'longitude' => 10,
                'latitude' => 11,
            ],
            'title' => 'test_title',
            'address' => 'test_address',
            'foursquare_id' => 'test_foursquare_id',
            'foursquare_type' => 'test_foursquare_type',
            'google_place_id' => 'test_google_place_id',
            'google_place_type' => 'test_google_place_type'
        ]);

        $this->assertEquals(
            10,
            $object->location->longitude->getValue()
        );

        $this->assertEquals(
            'test_title',
            $object->title->getValue()
        );

        $this->assertEquals(
            'test_address',
            $object->address->getValue()
        );

        $this->assertEquals(
            'test_foursquare_id',
            $object->foursquareId->getValue()
        );

        $this->assertEquals(
            'test_foursquare_type',
            $object->foursquareType->getValue()
        );

        $this->assertEquals(
            'test_google_place_id',
            $object->googlePlaceId->getValue()
        );

        $this->assertEquals(
            'test_google_place_type',
            $object->googlePlaceType->getValue()
        );
    }
}
