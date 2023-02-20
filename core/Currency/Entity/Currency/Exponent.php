<?php

declare(strict_types=1);

namespace Core\Currency\Entity\Currency;

use Core\Common\Entity\IntValueObject;
use Core\Currency\Entity\Currency\Exception\InvalidExponentException;

/** Value object for currency exponent separator */
final readonly class Exponent extends IntValueObject
{
    /**
     * @param int $value Positive number
     *
     * @throws InvalidExponentException if value is negative
     */
    public function __construct(int $value)
    {
        parent::__construct($value);

        if ($value < 0) {
            throw new InvalidExponentException(
                sprintf("Currency exponent must be a positive number, %d done", $value),
                0,
                $this
            );
        }
    }

    /**
     * @return int positive number
     */
    public function getValue(): int
    {
        return parent::getValue();
    }
}
