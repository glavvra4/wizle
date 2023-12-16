<?php

declare(strict_types=1);

namespace Core\Currency\Entity;

/** Currency data object */
readonly class Currency implements CurrencyInterface
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
        public Currency\Code               $code,
        public Currency\Title              $title,
        public Currency\Symbol             $symbol,
        public Currency\Native             $native,
        public Currency\ThousandsSeparator $thousandsSeparator,
        public Currency\DecimalSeparator   $decimalSeparator,
        public Currency\SymbolLeft         $symbolLeft,
        public Currency\SpaceBetween       $spaceBetween,
        public Currency\Exponent           $exponent
    )
    {
    }
}
