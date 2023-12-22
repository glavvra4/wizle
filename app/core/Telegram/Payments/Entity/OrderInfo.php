<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Entity;

/** This object represents information about an order. */
class OrderInfo implements OrderInfoInterface
{
    /**
     * @param OrderInfo\Name|null $name
     * @param OrderInfo\PhoneNumber|null $phoneNumber
     * @param OrderInfo\Email|null $email
     * @param ShippingAddress|null $shippingAddress
     */
    public function __construct(
        public readonly ?OrderInfo\Name        $name = null,
        public readonly ?OrderInfo\PhoneNumber $phoneNumber = null,
        public readonly ?OrderInfo\Email       $email = null,
        public readonly ?ShippingAddress       $shippingAddress = null
    )
    {
    }
}
