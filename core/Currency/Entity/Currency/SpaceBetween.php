<?php

declare(strict_types=1);

namespace Core\Currency\Entity\Currency;

use Core\Common\Entity\BoolValueObject;

/** Value object indicating whether the currency string has a space between symbol and value */
final readonly class SpaceBetween extends BoolValueObject
{
}
