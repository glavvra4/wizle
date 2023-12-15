<?php

declare(strict_types=1);

namespace Core\Common\Entity;

abstract class FloatValueObject extends BaseValueObject implements FloatValueObjectInterface
{
    /**
     * @param float $value
     */
    public function __construct(float $value)
    {
        parent::__construct($value);
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return parent::getValue();
    }
}
