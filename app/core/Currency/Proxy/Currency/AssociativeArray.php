<?php

declare(strict_types=1);

namespace Core\Currency\Proxy\Currency;

use Core\Currency\Entity\Currency;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends Currency
{
    public function __construct(
        #[ArrayShape([
            'code' => 'string',
            'title' => 'string',
            'symbol' => 'string',
            'native' => 'string',
            'thousands_separator' => 'string',
            'decimal_separator' => 'string',
            'symbol_left' => 'bool',
            'space_between' => 'bool',
            'exponent' => 'int'
        ])] array $data
    )
    {
        parent::__construct(
            new Currency\Code($data['code']),
            new Currency\Title($data['title']),
            new Currency\Symbol($data['symbol']),
            new Currency\Native($data['native']),
            new Currency\ThousandsSeparator($data['thousands_separator']),
            new Currency\DecimalSeparator($data['decimal_separator']),
            new Currency\SymbolLeft($data['symbol_left']),
            new Currency\SpaceBetween($data['space_between']),
            new Currency\Exponent($data['exponent'])
        );
    }
}
