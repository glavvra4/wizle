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
        public readonly Currency\Code               $code,
        public readonly Currency\Title              $title,
        public readonly Currency\Symbol             $symbol,
        public readonly Currency\Native             $native,
        public readonly Currency\ThousandsSeparator $thousandsSeparator,
        public readonly Currency\DecimalSeparator   $decimalSeparator,
        public readonly Currency\SymbolLeft         $symbolLeft,
        public readonly Currency\SpaceBetween       $spaceBetween,
        public readonly Currency\Exponent           $exponent
    )
    {
    }
}
