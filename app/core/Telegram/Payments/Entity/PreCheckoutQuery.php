<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Entity;

use Core\Currency\Entity\Currency;
use Core\Telegram\User\Entity\User;

/** This object contains information about an incoming pre-checkout query. */
class PreCheckoutQuery implements ShippingQueryInterface
{
    /**
     * @param PreCheckoutQuery\Id $id
     * @param User $from
     * @param Currency\Code $currency
     * @param Currency\Amount $totalAmount
     * @param Invoice\Payload $invoicePayload
     * @param ShippingOption\Id|null $shippingOptionId
     * @param OrderInfo|null $orderInfo
     */
    public function __construct(
        public readonly PreCheckoutQuery\Id $id,
        public readonly User                $from,
        public readonly Currency\Code       $currency,
        public readonly Currency\Amount     $totalAmount,
        public readonly Invoice\Payload     $invoicePayload,
        public readonly ?ShippingOption\Id  $shippingOptionId = null,
        public readonly ?OrderInfo          $orderInfo = null,
    )
    {
    }
}
