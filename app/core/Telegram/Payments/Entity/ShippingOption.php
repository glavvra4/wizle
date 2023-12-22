<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Entity;

/** This object represents one shipping option. */
class ShippingOption implements ShippingOptionInterface
{
    /**
     * @param ShippingOption\Id $id
     * @param ShippingOption\Title $title
     * @param LabeledPrices $prices
     */
    public function __construct(
        public readonly ShippingOption\Id    $id,
        public readonly ShippingOption\Title $title,
        public readonly LabeledPrices        $prices,
    )
    {
    }
}
