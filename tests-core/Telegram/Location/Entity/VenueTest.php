<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Location\Entity;

use Core\Telegram\Location\Entity\Location;
use Core\Telegram\Location\Entity\Venue;
use DateInterval;
use PHPUnit\Framework\TestCase;

class VenueTest extends TestCase
{
    public function testGetValues()
    {
        $locationStub = $this->createStub(Location::class);
        $locationStub->method('getLongitude')
            ->willReturn(new Location\Longitude(45.072314));

        $object = new Venue(
            $locationStub,
            new Venue\Title('test_title'),
            new Venue\Address('test_address'),
            new Venue\FoursquareId('test_foursquare_id'),
            new Venue\FoursquareType('test_foursquare_type'),
            new Venue\GooglePlaceId('test_google_place_id'),
            new Venue\GooglePlaceType('test_google_place_type')
        );

        $this->assertEquals(
            45.072314,
            $object->getLocation()->getLongitude()->getValue()
        );

        $this->assertEquals(
            'test_title',
            $object->getTitle()->getValue()
        );

        $this->assertEquals(
            'test_address',
            $object->getAddress()->getValue()
        );

        $this->assertEquals(
            'test_foursquare_id',
            $object->getFoursquareId()->getValue()
        );

        $this->assertEquals(
            'test_foursquare_type',
            $object->getFoursquareType()->getValue()
        );

        $this->assertEquals(
            'test_google_place_id',
            $object->getGooglePlaceId()->getValue()
        );

        $this->assertEquals(
            'test_google_place_type',
            $object->getGooglePlaceType()->getValue()
        );
    }
}
