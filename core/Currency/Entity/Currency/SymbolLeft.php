<?php

declare(strict_types=1);

namespace Core\Currency\Entity\Currency;

use Core\Common\Entity\BoolValueObject;

/** Value object indicating whether the currency string has a symbol on the left side */
final readonly class SymbolLeft extends BoolValueObject
{
}
