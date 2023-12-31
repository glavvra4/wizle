<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Entity;

use Core\Currency\Entity\Currency;

/** This object represents a portion of the price for goods or services. */
class LabeledPrice implements LabeledPriceInterface
{
    /**
     * @param LabeledPrice\Label $label
     * @param Currency\Amount $amount
     */
    public function __construct(
        public readonly LabeledPrice\Label $label,
        public readonly Currency\Amount    $amount,
    )
    {
    }
}
