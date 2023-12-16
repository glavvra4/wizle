<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Proxy\LabeledPrice;

use Core\Currency\Entity\Currency;
use Core\Telegram\Payments\Entity\LabeledPrice;
use JetBrains\PhpStorm\ArrayShape;

readonly class AssociativeArray extends LabeledPrice
{
    public function __construct(
        #[ArrayShape([
            'label' => 'string',
            'amount' => 'integer'
        ])] array $data
    )
    {
        parent::__construct(
            new LabeledPrice\Label($data['label']),
            new Currency\Amount($data['amount']),
        );
    }
}
