<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Location\Proxy\Venue;

use Core\Telegram\Location\Proxy\Venue\AssociativeArray;
use Exception;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'location' => [
                'longitude' => 45.072314,
                'latitude' => 39.039317,
                'horizontal_accuracy' => 10,
                'live_period' => 200,
                'heading' => 180,
                'proximity_alert_radius' => 100
            ],
            'title' => 'test_title',
            'address' => 'test_address',
            'foursquare_id' => 'test_foursquare_id',
            'foursquare_type' => 'test_foursquare_type',
            'google_place_id' => 'test_google_place_id',
            'google_place_type' => 'test_google_place_type'
        ]);

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
