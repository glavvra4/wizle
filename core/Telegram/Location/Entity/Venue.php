<?php

declare(strict_types=1);

namespace Core\Telegram\Location\Entity;

readonly class Venue implements VenueInterface
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
        public Location               $location,
        public Venue\Title            $title,
        public Venue\Address          $address,
        public ?Venue\FoursquareId    $foursquareId = null,
        public ?Venue\FoursquareType  $foursquareType = null,
        public ?Venue\GooglePlaceId   $googlePlaceId = null,
        public ?Venue\GooglePlaceType $googlePlaceType = null,
    )
    {
    }
}
