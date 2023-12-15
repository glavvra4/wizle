<?php

declare(strict_types=1);

namespace Core\Telegram\Location\Proxy\Venue;

use Core\Common\Proxy\BaseAssociativeArray;
use Core\Common\Entity\Exception\EntityException;
use Core\Telegram\Location\Proxy\Location\AssociativeArray as LocationAssociativeArrayProxy;
use Core\Telegram\Location\Entity\LocationInterface;
use Core\Telegram\Location\Entity\Venue;
use Core\Telegram\Location\Entity\VenueInterface;
use Exception;

class AssociativeArray extends BaseAssociativeArray implements VenueInterface
{
    protected Venue $venue;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'location' => 'array',
            'title' => 'string',
            'address' => 'string',
            'foursquare_id' => 'string',
            'foursquare_type' => 'string',
            'google_place_id' => 'string',
            'google_place_type' => 'string'
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMandatoryFields(): array
    {
        return [
            'location',
            'title',
            'address',
        ];
    }

    /**
     * @param array{location: array, title: string, address: string, foursquare_id: string, foursquare_type: string, google_place_id: string, google_place_type: string} $data
     *
     * @throws EntityException extended from location
     * @throws Exception extended from location
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->venue = new Venue(
            new LocationAssociativeArrayProxy($data['location']),
            new Venue\Title($data['title']),
            new Venue\Address($data['address']),
            (array_key_exists('foursquare_id', $data) && $data['foursquare_id'] !== null)
                ? new Venue\FoursquareId($data['foursquare_id'])
                : null,
            (array_key_exists('foursquare_type', $data) && $data['foursquare_type'] !== null)
                ? new Venue\FoursquareType($data['foursquare_type'])
                : null,
            (array_key_exists('google_place_id', $data) && $data['google_place_id'] !== null)
                ? new Venue\GooglePlaceId($data['google_place_id'])
                : null,
            (array_key_exists('google_place_type', $data) && $data['google_place_type'] !== null)
                ? new Venue\GooglePlaceType($data['google_place_type'])
                : null,
        );
    }

    public function getLocation(): LocationInterface
    {
        return $this->venue->getLocation();
    }

    public function getTitle(): Venue\Title
    {
        return $this->venue->getTitle();
    }

    public function getAddress(): Venue\Address
    {
        return $this->venue->getAddress();
    }

    public function getFoursquareId(): ?Venue\FoursquareId
    {
        return $this->venue->getFoursquareId();
    }

    public function getFoursquareType(): ?Venue\FoursquareType
    {
        return $this->venue->getFoursquareType();
    }

    public function getGooglePlaceId(): ?Venue\GooglePlaceId
    {
        return $this->venue->getGooglePlaceId();
    }

    public function getGooglePlaceType(): ?Venue\GooglePlaceType
    {
        return $this->venue->getGooglePlaceType();
    }
}
