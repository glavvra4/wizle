<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Entity;

use Core\Telegram\User\Entity\User;

/** This object contains information about an incoming shipping query. */
readonly class ShippingQuery implements ShippingQueryInterface
{
    /**
     * @param ShippingQuery\Id $id
     * @param User $from
     * @param Invoice\Payload $invoicePayload
     * @param ShippingAddress $shippingAddress
     */
    public function __construct(
        public ShippingQuery\Id $id,
        public User             $from,
        public Invoice\Payload  $invoicePayload,
        public ShippingAddress  $shippingAddress
    )
    {
    }
}
