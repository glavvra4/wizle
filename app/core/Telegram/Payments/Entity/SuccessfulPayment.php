<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Entity;

use Core\Currency\Entity\Currency;

/** This object contains basic information about a successful payment. */
readonly class SuccessfulPayment implements SuccessfulPaymentInterface
{
    /**
     * @param Currency\Code $currency
     * @param Currency\Amount $totalAmount
     * @param Invoice\Payload $invoicePayload
     * @param SuccessfulPayment\TelegramPaymentChargeId $telegramPaymentChargeId
     * @param SuccessfulPayment\ProviderPaymentChargeId $providerPaymentChargeId
     * @param ShippingOption\Id|null $shippingOptionId
     * @param OrderInfo|null $orderInfo
     */
    public function __construct(
        public Currency\Code                             $currency,
        public Currency\Amount                           $totalAmount,
        public Invoice\Payload                           $invoicePayload,
        public SuccessfulPayment\TelegramPaymentChargeId $telegramPaymentChargeId,
        public SuccessfulPayment\ProviderPaymentChargeId $providerPaymentChargeId,
        public ?ShippingOption\Id                        $shippingOptionId = null,
        public ?OrderInfo                                $orderInfo = null,
    )
    {
    }
}
