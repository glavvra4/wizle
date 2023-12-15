<?php

declare(strict_types=1);

namespace Core\Telegram\Location\Entity;

interface VenueInterface
{
    /**
     * @return LocationInterface
     */
    public function getLocation(): LocationInterface;

    /**
     * @return Venue\Title
     */
    public function getTitle(): Venue\Title;

    /**
     * @return Venue\Address
     */
    public function getAddress(): Venue\Address;

    /**
     * @return Venue\FoursquareId|null
     */
    public function getFoursquareId(): ?Venue\FoursquareId;

    /**
     * @return Venue\FoursquareType|null
     */
    public function getFoursquareType(): ?Venue\FoursquareType;

    /**
     * @return Venue\GooglePlaceId|null
     */
    public function getGooglePlaceId(): ?Venue\GooglePlaceId;

    /**
     * @return Venue\GooglePlaceType|null
     */
    public function getGooglePlaceType(): ?Venue\GooglePlaceType;
}
