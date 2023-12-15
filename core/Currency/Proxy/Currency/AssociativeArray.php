<?php

declare(strict_types=1);

namespace Core\Currency\Proxy\Currency;

use Core\Common\Proxy\BaseAssociativeArray;
use Core\Currency\Entity\Currency;
use Core\Currency\Entity\CurrencyInterface;

class AssociativeArray extends BaseAssociativeArray implements CurrencyInterface
{
    protected Currency $currency;

    protected function getFieldTypes(): array
    {
        return [
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
    }

    protected function getMandatoryFields(): array
    {
        return [
            'code',
            'title',
            'symbol',
            'native',
            'thousands_separator',
            'decimal_separator',
            'symbol_left',
            'space_between',
            'exponent'
        ];
    }

    /**
     * @param array{code:string, title:string, symbol:string, native: string, thousands_separator: string, decimal_separator: string, symbol_left: bool, space_between: bool, exponent: int} $data
     *
     * @throws Currency\Exception\InvalidCodeException
     * @throws Currency\Exception\InvalidDecimalSeparatorException
     * @throws Currency\Exception\InvalidExponentException
     * @throws Currency\Exception\InvalidThousandsSeparatorException
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->currency = new Currency(
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

    public function getCode(): Currency\Code
    {
        return $this->currency->getCode();
    }

    public function getTitle(): Currency\Title
    {
        return $this->currency->getTitle();
    }

    public function getSymbol(): Currency\Symbol
    {
        return $this->currency->getSymbol();
    }

    public function getNative(): Currency\Native
    {
        return $this->currency->getNative();
    }

    public function getThousandsSeparator(): Currency\ThousandsSeparator
    {
        return $this->currency->getThousandsSeparator();
    }

    public function getDecimalSeparator(): Currency\DecimalSeparator
    {
        return $this->currency->getDecimalSeparator();
    }

    public function getSymbolLeft(): Currency\SymbolLeft
    {
        return $this->currency->getSymbolLeft();
    }

    public function getSpaceBetween(): Currency\SpaceBetween
    {
        return $this->currency->getSpaceBetween();
    }

    public function getExponent(): Currency\Exponent
    {
        return $this->currency->getExponent();
    }
}
