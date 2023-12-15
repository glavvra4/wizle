<?php

declare(strict_types=1);

namespace Core\Telegram\Location\Entity;

use Core\Telegram\Location\Entity\Venue\Address;
use Core\Telegram\Location\Entity\Venue\FoursquareId;
use Core\Telegram\Location\Entity\Venue\FoursquareType;
use Core\Telegram\Location\Entity\Venue\GooglePlaceId;
use Core\Telegram\Location\Entity\Venue\GooglePlaceType;
use Core\Telegram\Location\Entity\Venue\Title;

class Venue implements VenueInterface
{
    /**
     * @param LocationInterface $location
     * @param Title $title
     * @param Address $address
     * @param FoursquareId|null $foursquareId
     * @param FoursquareType|null $foursquareType
     * @param GooglePlaceId|null $googlePlaceId
     * @param GooglePlaceType|null $googlePlaceType
     */
    public function __construct(
        protected LocationInterface $location,
        protected Venue\Title $title,
        protected Venue\Address $address,
        protected ?Venue\FoursquareId $foursquareId = null,
        protected ?Venue\FoursquareType $foursquareType = null,
        protected ?Venue\GooglePlaceId $googlePlaceId = null,
        protected ?Venue\GooglePlaceType $googlePlaceType = null,
    )
    {
    }

    /**
     * @return LocationInterface
     */
    public function getLocation(): LocationInterface
    {
        return $this->location;
    }

    /**
     * @return Venue\Title
     */
    public function getTitle(): Venue\Title
    {
        return $this->title;
    }

    /**
     * @return Venue\Address
     */
    public function getAddress(): Venue\Address
    {
        return $this->address;
    }

    /**
     * @return Venue\FoursquareId|null
     */
    public function getFoursquareId(): ?Venue\FoursquareId
    {
        return $this->foursquareId;
    }

    /**
     * @return Venue\FoursquareType|null
     */
    public function getFoursquareType(): ?Venue\FoursquareType
    {
        return $this->foursquareType;
    }

    /**
     * @return Venue\GooglePlaceId|null
     */
    public function getGooglePlaceId(): ?Venue\GooglePlaceId
    {
        return $this->googlePlaceId;
    }

    /**
     * @return Venue\GooglePlaceType|null
     */
    public function getGooglePlaceType(): ?Venue\GooglePlaceType
    {
        return $this->googlePlaceType;
    }
}
