<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Entity;

/** This object represents one shipping option. */
readonly class ShippingOption implements ShippingOptionInterface
{
    /**
     * @param ShippingOption\Id $id
     * @param ShippingOption\Title $title
     * @param LabeledPrices $prices
     */
    public function __construct(
        public ShippingOption\Id    $id,
        public ShippingOption\Title $title,
        public LabeledPrices        $prices,
    )
    {
    }
}
