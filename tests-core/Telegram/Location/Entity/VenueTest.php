<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Location\Entity;

use Core\Telegram\Location\Entity\Location;
use Core\Telegram\Location\Entity\Venue;
use PHPUnit\Framework\TestCase;

class VenueTest extends TestCase
{
    public function testGetValues()
    {
        $object = new Venue(
            new Location(
                new Location\Longitude(10),
                new Location\Latitude(11),
            ),
            new Venue\Title('test_title'),
            new Venue\Address('test_address'),
            new Venue\FoursquareId('test_foursquare_id'),
            new Venue\FoursquareType('test_foursquare_type'),
            new Venue\GooglePlaceId('test_google_place_id'),
            new Venue\GooglePlaceType('test_google_place_type')
        );

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
