<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Entity;

/** This object represents a shipping address. */
class ShippingAddress implements ShippingAddressInterface
{
    /**
     * @param ShippingAddress\CountryCode $countryCode
     * @param ShippingAddress\State $state
     * @param ShippingAddress\City $city
     * @param ShippingAddress\StreetLine1 $streetLine1
     * @param ShippingAddress\StreetLine2 $streetLine2
     * @param ShippingAddress\PostCode $postCode
     */
    public function __construct(
        public readonly ShippingAddress\CountryCode $countryCode,
        public readonly ShippingAddress\State       $state,
        public readonly ShippingAddress\City        $city,
        public readonly ShippingAddress\StreetLine1 $streetLine1,
        public readonly ShippingAddress\StreetLine2 $streetLine2,
        public readonly ShippingAddress\PostCode    $postCode,
    )
    {
    }
}
