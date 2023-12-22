<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Proxy\PreCheckoutQuery;

use Core\Currency\Entity\Currency;
use Core\Telegram\Payments\Entity\Invoice;
use Core\Telegram\Payments\Entity\PreCheckoutQuery;
use Core\Telegram\Payments\Entity\ShippingOption;
use Core\Telegram\Payments\Proxy\OrderInfo\AssociativeArray as OrderInfoAssociativeArrayProxy;
use Core\Telegram\User\Proxy\User\AssociativeArray as UserAssociativeArrayProxy;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends PreCheckoutQuery
{
    public function __construct(
        #[ArrayShape([
            'id' => 'string',
            'from' => 'array',
            'currency' => 'string',
            'total_amount' => 'int',
            'invoice_payload' => 'string',
            'shipping_option_id' => 'string',
            'order_info' => 'array',
        ])] array $data
    )
    {
        parent::__construct(
            new PreCheckoutQuery\Id($data['id']),
            new UserAssociativeArrayProxy($data['from']),
            new Currency\Code($data['currency']),
            new Currency\Amount($data['total_amount']),
            new Invoice\Payload($data['invoice_payload']),
            isset($data['shipping_option_id'])
                ? new ShippingOption\Id($data['shipping_option_id'])
                : null,
            isset($data['order_info'])
                ? new OrderInfoAssociativeArrayProxy($data['order_info'])
                : null,
        );
    }
}
