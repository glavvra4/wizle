<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Proxy\SuccessfulPayment;

use Core\Currency\Entity\Currency;
use Core\Telegram\Payments\Entity\Invoice;
use Core\Telegram\Payments\Entity\ShippingOption;
use Core\Telegram\Payments\Entity\SuccessfulPayment;
use Core\Telegram\Payments\Proxy\OrderInfo\AssociativeArray as OrderInfoAssociativeArrayProxy;
use JetBrains\PhpStorm\ArrayShape;

readonly class AssociativeArray extends SuccessfulPayment
{
    public function __construct(
        #[ArrayShape([
            'currency' => 'string',
            'total_amount' => 'int',
            'invoice_payload' => 'string',
            'telegram_payment_charge_id' => 'string',
            'provider_payment_charge_id' => 'string',
            'shipping_option_id' => 'string',
            'order_info' => 'array',
        ])] array $data
    )
    {
        parent::__construct(
            new Currency\Code($data['currency']),
            new Currency\Amount($data['total_amount']),
            new Invoice\Payload($data['invoice_payload']),
            new SuccessfulPayment\TelegramPaymentChargeId($data['telegram_payment_charge_id']),
            new SuccessfulPayment\ProviderPaymentChargeId($data['provider_payment_charge_id']),
            isset($data['shipping_option_id'])
                ? new ShippingOption\Id($data['shipping_option_id'])
                : null,
            isset($data['order_info'])
                ? new OrderInfoAssociativeArrayProxy($data['order_info'])
                : null,
        );
    }
}
