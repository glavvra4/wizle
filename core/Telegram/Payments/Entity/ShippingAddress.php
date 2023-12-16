<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Entity;

/** This object represents a shipping address. */
readonly class ShippingAddress implements ShippingAddressInterface
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
        public ShippingAddress\CountryCode $countryCode,
        public ShippingAddress\State       $state,
        public ShippingAddress\City        $city,
        public ShippingAddress\StreetLine1 $streetLine1,
        public ShippingAddress\StreetLine2 $streetLine2,
        public ShippingAddress\PostCode    $postCode,
    )
    {
    }
}
