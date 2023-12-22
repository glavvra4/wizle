<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Proxy\Invoice;

use Core\Currency\Entity\Currency;
use Core\Telegram\Payments\Entity\Invoice;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends Invoice
{
    public function __construct(
        #[ArrayShape([
            'title' => 'string',
            'description' => 'string',
            'start_parameter' => 'string',
            'currency' => 'string',
            'total_amount' => 'int'
        ])] array $data
    )
    {
        parent::__construct(
            new Invoice\Title($data['title']),
            new Invoice\Description($data['description']),
            new Invoice\StartParameter($data['start_parameter']),
            new Currency\Code($data['currency']),
            new Currency\Amount($data['total_amount']),
        );
    }
}
