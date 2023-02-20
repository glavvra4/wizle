<?php

declare(strict_types=1);

namespace Core\Common\Entity;

abstract readonly class StringValueObject extends BaseValueObject implements StringValueObjectInterface
{
    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
