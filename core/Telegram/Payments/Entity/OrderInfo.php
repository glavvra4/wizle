<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Entity;

/** This object represents information about an order. */
readonly class OrderInfo implements OrderInfoInterface
{
    /**
     * @param OrderInfo\Name|null $name
     * @param OrderInfo\PhoneNumber|null $phoneNumber
     * @param OrderInfo\Email|null $email
     * @param ShippingAddress|null $shippingAddress
     */
    public function __construct(
        public ?OrderInfo\Name        $name = null,
        public ?OrderInfo\PhoneNumber $phoneNumber = null,
        public ?OrderInfo\Email       $email = null,
        public ?ShippingAddress       $shippingAddress = null
    )
    {
    }
}
