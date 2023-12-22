<?php

declare(strict_types=1);

namespace Core\Telegram\Location\Proxy\Venue;

use Core\Telegram\Location\Entity\Venue;
use Core\Telegram\Location\Proxy\Location\AssociativeArray as LocationAssociativeArrayProxy;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends Venue
{
    public function __construct(
        #[ArrayShape([
            'location' => 'array',
            'title' => 'string',
            'address' => 'string',
            'foursquare_id' => 'string',
            'foursquare_type' => 'string',
            'google_place_id' => 'string',
            'google_place_type' => 'string'
        ])] array $data)
    {
        parent::__construct(
            new LocationAssociativeArrayProxy($data['location']),
            new Venue\Title($data['title']),
            new Venue\Address($data['address']),
            isset($data['foursquare_id'])
                ? new Venue\FoursquareId($data['foursquare_id'])
                : null,
            isset($data['foursquare_type'])
                ? new Venue\FoursquareType($data['foursquare_type'])
                : null,
            isset($data['google_place_id'])
                ? new Venue\GooglePlaceId($data['google_place_id'])
                : null,
            isset($data['google_place_type'])
                ? new Venue\GooglePlaceType($data['google_place_type'])
                : null,
        );
    }
}
