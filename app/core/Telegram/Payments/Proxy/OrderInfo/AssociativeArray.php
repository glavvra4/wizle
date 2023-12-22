<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Proxy\OrderInfo;

use Core\Telegram\Payments\Entity\OrderInfo;
use Core\Telegram\Payments\Proxy\ShippingAddress\AssociativeArray as ShippingAddressAssociativeArrayProxy;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends OrderInfo
{
    public function __construct(
        #[ArrayShape([
            'name' => 'string',
            'phone_number' => 'string',
            'email' => 'string',
            'shipping_address' => 'array',
        ])] array $data
    )
    {
        parent::__construct(
            isset($data['name'])
                ? new OrderInfo\Name($data['name'])
                : null,
            isset($data['phone_number'])
                ? new OrderInfo\PhoneNumber($data['phone_number'])
                : null,
            isset($data['email'])
                ? new OrderInfo\Email($data['email'])
                : null,
            isset($data['shipping_address'])
                ? new ShippingAddressAssociativeArrayProxy($data['shipping_address'])
                : null,
        );
    }
}
