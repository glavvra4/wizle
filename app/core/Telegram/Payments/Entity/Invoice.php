<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Entity;

use Core\Currency\Entity\Currency;

/** This object contains basic information about an invoice. */
class Invoice implements InvoiceInterface
{
    /**
     * @param Invoice\Title $title
     * @param Invoice\Description $description
     * @param Invoice\StartParameter $startParameter
     * @param Currency\Code $currency
     * @param Currency\Amount $totalAmount
     */
    public function __construct(
        public readonly Invoice\Title          $title,
        public readonly Invoice\Description    $description,
        public readonly Invoice\StartParameter $startParameter,
        public readonly Currency\Code          $currency,
        public readonly Currency\Amount        $totalAmount,
    )
    {
    }
}
