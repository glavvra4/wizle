<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Proxy\ShippingQuery;

use Core\Telegram\Payments\Entity\Invoice;
use Core\Telegram\Payments\Entity\ShippingQuery;
use Core\Telegram\Payments\Proxy\ShippingAddress\AssociativeArray as ShippingAddressAssociativeArrayProxy;
use Core\Telegram\User\Proxy\User\AssociativeArray as UserAssociativeArrayProxy;
use JetBrains\PhpStorm\ArrayShape;

readonly class AssociativeArray extends ShippingQuery
{
    public function __construct(
        #[ArrayShape([
            'id' => 'string',
            'from' => 'array',
            'invoice_payload' => 'string',
            'shipping_address' => 'array',
        ])] array $data
    )
    {
        parent::__construct(
            new ShippingQuery\Id($data['id']),
            new UserAssociativeArrayProxy($data['from']),
            new Invoice\Payload($data['invoice_payload']),
            new ShippingAddressAssociativeArrayProxy($data['shipping_address'])
        );
    }
}
