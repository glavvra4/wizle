<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Proxy\ShippingOption;

use Core\Telegram\Payments\Entity\ShippingOption;
use Core\Telegram\Payments\Proxy\LabeledPrices\IndexedArray as LabeledPricesIndexedArrayProxy;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends ShippingOption
{
    public function __construct(
        #[ArrayShape([
            'id' => 'string',
            'title' => 'string',
            'prices' => 'array',
        ])] array $data
    )
    {
        parent::__construct(
            new ShippingOption\Id($data['id']),
            new ShippingOption\Title($data['title']),
            new LabeledPricesIndexedArrayProxy($data['prices']),
        );
    }
}
