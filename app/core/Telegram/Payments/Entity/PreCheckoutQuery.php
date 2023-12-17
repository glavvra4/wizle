<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Entity;

use Core\Currency\Entity\Currency;
use Core\Telegram\User\Entity\User;

/** This object contains information about an incoming pre-checkout query. */
readonly class PreCheckoutQuery implements ShippingQueryInterface
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
        public PreCheckoutQuery\Id $id,
        public User                $from,
        public Currency\Code       $currency,
        public Currency\Amount     $totalAmount,
        public Invoice\Payload     $invoicePayload,
        public ?ShippingOption\Id  $shippingOptionId = null,
        public ?OrderInfo          $orderInfo = null,
    )
    {
    }
}
