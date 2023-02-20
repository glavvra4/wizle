<?php

declare(strict_types=1);

namespace Core\Currency\Entity;

use Core\Currency\Entity\Currency;

interface CurrencyInterface
{
    public function getCode(): Currency\Code;
    public function getTitle(): Currency\Title;
    public function getSymbol(): Currency\Symbol;
    public function getNative(): Currency\Native;
    public function getThousandsSeparator(): Currency\ThousandsSeparator;
    public function getDecimalSeparator(): Currency\DecimalSeparator;
    public function getSymbolLeft(): Currency\SymbolLeft;
    public function getSpaceBetween(): Currency\SpaceBetween;
    public function getExponent(): Currency\Exponent;
}
