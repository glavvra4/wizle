<?php

declare(strict_types=1);

namespace Core\Currency\Entity\Currency;

use Core\Common\Entity\StringValueObject;
use Core\Currency\Entity\Currency\Exception\InvalidThousandsSeparatorException;

/** Value object for currency decimal separator */
class ThousandsSeparator extends StringValueObject
{
    /**
     * @param string $value single character
     *
     * @throws InvalidThousandsSeparatorException if thousands separator has an incorrect format
     */
    public function __construct(string $value)
    {
        parent::__construct($value);

        if (mb_strlen($value) !== 1) {
            throw new InvalidThousandsSeparatorException(
                sprintf("Currency thousands separator must be a single character, \"%s\" givem", $value),
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
