<?php

declare(strict_types=1);

namespace Core\Currency\Entity\Currency;

use Core\Common\Entity\StringValueObject;
use Core\Currency\Entity\Currency\Exception\InvalidDecimalSeparatorException;

/** Value object for currency decimal separator */
class DecimalSeparator extends StringValueObject
{
    /**
     * @param string $value Single character
     *
     * @throws InvalidDecimalSeparatorException if decimal separator has an incorrect format
     */
    public function __construct(string $value)
    {
        parent::__construct($value);

        if (mb_strlen($value) !== 1) {
            throw new InvalidDecimalSeparatorException(
                sprintf("Currency decimal separator must be a single character, \"%s\" given", $value),
                0,
                $this
            );
        }
    }

    /**
     * @return string single character
     */
    public function getValue(): string
    {
        return parent::getValue();
    }
}
