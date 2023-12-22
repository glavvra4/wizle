<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Entity;

use Core\Currency\Entity\Currency;

/** This object contains basic information about a successful payment. */
class SuccessfulPayment implements SuccessfulPaymentInterface
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
        public readonly Currency\Code                             $currency,
        public readonly Currency\Amount                           $totalAmount,
        public readonly Invoice\Payload                           $invoicePayload,
        public readonly SuccessfulPayment\TelegramPaymentChargeId $telegramPaymentChargeId,
        public readonly SuccessfulPayment\ProviderPaymentChargeId $providerPaymentChargeId,
        public readonly ?ShippingOption\Id                        $shippingOptionId = null,
        public readonly ?OrderInfo                                $orderInfo = null,
    )
    {
    }
}
