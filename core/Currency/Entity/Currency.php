<?php

declare(strict_types=1);

namespace Core\Currency\Entity;

/** Currency data object */
class Currency implements CurrencyInterface
{
    /**
     * @param Currency\Code $code
     * @param Currency\Title $title
     * @param Currency\Symbol $symbol
     * @param Currency\Native $native
     * @param Currency\ThousandsSeparator $thousandsSeparator
     * @param Currency\DecimalSeparator $decimalSeparator
     * @param Currency\SymbolLeft $symbolLeft
     * @param Currency\SpaceBetween $spaceBetween
     * @param Currency\Exponent $exponent
     *
     * @throws Currency\Exception\InvalidCodeException
     * @throws Currency\Exception\InvalidDecimalSeparatorException
     * @throws Currency\Exception\InvalidExponentException
     * @throws Currency\Exception\InvalidThousandsSeparatorException
     */
    public function __construct(
        protected Currency\Code $code,
        protected Currency\Title $title,
        protected Currency\Symbol $symbol,
        protected Currency\Native $native,
        protected Currency\ThousandsSeparator $thousandsSeparator,
        protected Currency\DecimalSeparator $decimalSeparator,
        protected Currency\SymbolLeft $symbolLeft,
        protected Currency\SpaceBetween $spaceBetween,
        protected Currency\Exponent $exponent
    )
    {
    }

    /**
     * @return Currency\Code
     */
    public function getCode(): Currency\Code
    {
        return $this->code;
    }

    /**
     * @return Currency\Title
     */
    public function getTitle(): Currency\Title
    {
        return $this->title;
    }

    /**
     * @return Currency\Symbol
     */
    public function getSymbol(): Currency\Symbol
    {
        return $this->symbol;
    }

    /**
     * @return Currency\Native
     */
    public function getNative(): Currency\Native
    {
        return $this->native;
    }

    /**
     * @return Currency\ThousandsSeparator
     */
    public function getThousandsSeparator(): Currency\ThousandsSeparator
    {
        return $this->thousandsSeparator;
    }

    /**
     * @return Currency\DecimalSeparator
     */
    public function getDecimalSeparator(): Currency\DecimalSeparator
    {
        return $this->decimalSeparator;
    }

    /**
     * @return Currency\SymbolLeft
     */
    public function getSymbolLeft(): Currency\SymbolLeft
    {
        return $this->symbolLeft;
    }

    /**
     * @return Currency\SpaceBetween
     */
    public function getSpaceBetween(): Currency\SpaceBetween
    {
        return $this->spaceBetween;
    }

    /**
     * @return Currency\Exponent
     */
    public function getExponent(): Currency\Exponent
    {
        return $this->exponent;
    }
}
