<?php

declare(strict_types=1);

namespace Core\Common\Entity;

abstract readonly class BoolValueObject extends BaseValueObject implements BoolValueObjectInterface
{
    /**
     * @param bool $value
     */
    public function __construct(bool $value)
    {
        parent::__construct($value);
    }

    /**
     * @return bool
     */
    public function getValue(): bool
    {
        return $this->value;
    }
}
