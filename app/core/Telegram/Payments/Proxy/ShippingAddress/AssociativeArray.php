<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Proxy\ShippingAddress;

use Core\Telegram\Payments\Entity\ShippingAddress;
use JetBrains\PhpStorm\ArrayShape;

readonly class AssociativeArray extends ShippingAddress
{
    public function __construct(
        #[ArrayShape([
            'country_code' => 'string',
            'state' => 'string',
            'city' => 'string',
            'street_line1' => 'string',
            'street_line2' => 'string',
            'post_code' => 'string',
        ])] array $data
    )
    {
        parent::__construct(
            new ShippingAddress\CountryCode($data['country_code']),
            new ShippingAddress\State($data['state']),
            new ShippingAddress\City($data['city']),
            new ShippingAddress\StreetLine1($data['street_line1']),
            new ShippingAddress\StreetLine2($data['street_line2']),
            new ShippingAddress\PostCode($data['post_code']),
        );
    }
}
