<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Entity;

use Core\Currency\Entity\Currency;

/** This object contains basic information about an invoice. */
readonly class Invoice implements InvoiceInterface
{
    /**
     * @param Invoice\Title $title
     * @param Invoice\Description $description
     * @param Invoice\StartParameter $startParameter
     * @param Currency\Code $currency
     * @param Currency\Amount $totalAmount
     */
    public function __construct(
        public Invoice\Title          $title,
        public Invoice\Description    $description,
        public Invoice\StartParameter $startParameter,
        public Currency\Code          $currency,
        public Currency\Amount        $totalAmount,
    )
    {
    }
}
