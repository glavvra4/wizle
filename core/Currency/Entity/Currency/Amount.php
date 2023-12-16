<?php

declare(strict_types=1);

namespace Core\Currency\Entity\Currency;

use Core\Common\Entity\IntValueObject;
use Core\Currency\Entity\Currency\Exception\InvalidAmountException;

/** Price in the smallest units of the currency. For example, for a price of US$ 1.45 pass amount = 145. */
class Amount extends IntValueObject
{
    /**
     * @param int $value Positive number
     *
     * @throws InvalidAmountException if value is negative
     */
    public function __construct(int $value)
    {
        parent::__construct($value);

        if ($value < 0) {
            throw new InvalidAmountException(
                sprintf("Currency amount must be a positive number, %d given", $value),
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
