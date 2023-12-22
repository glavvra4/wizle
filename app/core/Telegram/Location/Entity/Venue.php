<?php

declare(strict_types=1);

namespace Core\Telegram\Location\Entity;

class Venue implements VenueInterface
{
    /**
     * @param Location $location
     * @param Venue\Title $title
     * @param Venue\Address $address
     * @param Venue\FoursquareId|null $foursquareId
     * @param Venue\FoursquareType|null $foursquareType
     * @param Venue\GooglePlaceId|null $googlePlaceId
     * @param Venue\GooglePlaceType|null $googlePlaceType
     */
    public function __construct(
        public readonly Location               $location,
        public readonly Venue\Title            $title,
        public readonly Venue\Address          $address,
        public readonly ?Venue\FoursquareId    $foursquareId = null,
        public readonly ?Venue\FoursquareType  $foursquareType = null,
        public readonly ?Venue\GooglePlaceId   $googlePlaceId = null,
        public readonly ?Venue\GooglePlaceType $googlePlaceType = null,
    )
    {
    }
}
