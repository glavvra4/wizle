<?php

declare(strict_types=1);

namespace Core\Currency\Entity\Currency;

use Core\Common\Entity\StringValueObject;
use Core\Currency\Entity\Currency\Exception\InvalidCodeException;

/** Value object for ISO 4217 currency code */
class Code extends StringValueObject
{
    /**
     * @param string $value ISO 4217 currency code
     *
     * @throws InvalidCodeException if code has an incorrect format
     */
    public function __construct(string $value)
    {
        parent::__construct($value);

        if (mb_strlen($value) !== 3 OR !ctype_upper($value)) {
            throw new InvalidCodeException(
                sprintf("ISO 4217 currency code must contain three Latin alphas and be uppercase, \"%s\" given", $value),
                0,
                $this
            );
        }
    }

    /**
     * @return string ISO 4217 currency code
     */
    public function getValue(): string
    {
        return parent::getValue();
    }
}
