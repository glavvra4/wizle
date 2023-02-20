<?php

declare(strict_types=1);

namespace Core\Common\Entity;

abstract readonly class IntValueObject extends BaseValueObject implements IntValueObjectInterface
{
    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        parent::__construct($value);
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}
