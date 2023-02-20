<?php

declare(strict_types=1);

namespace Core\Currency\Adapter;

use Core\Common\Adapter\InvalidAdapterDataException;
use Core\Currency\Entity\Currency;
use Core\Currency\Entity\CurrencyInterface;

readonly class AssociativeArray extends Currency implements CurrencyInterface
{
    private const TYPES_MAPPING = [
        'code' => 'string',
        'title' => 'string',
        'symbol' => 'string',
        'native' => 'string',
        'thousands_separator' => 'string',
        'decimal_separator' => 'string',
        'symbol_left' => 'boolean',
        'space_between' => 'boolean',
        'exponent' => 'integer'
    ];

    /**
     * @param array{code:string, title:string, symbol:string, native: string, thousands_separator: string, decimal_separator: string, symbol_left: bool, space_between: bool, exponent: int} $data
     */
    public function __construct(array $data)
    {
        foreach (self::TYPES_MAPPING as $key => $type) {
            if (!array_key_exists($key, $data)) {
                throw new InvalidAdapterDataException(
                    sprintf("Key \"%s\" is mandatory in \"data\" array", $key)
                );
            }

            if (gettype($data[$key]) !== $type) {
                throw new InvalidAdapterDataException(
                    sprintf("The type of \"%s\" value in \"data\" array must be %s, %s given", $key, $type, gettype($data[$key]))
                );
            }
        }

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
