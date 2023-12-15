<?php

declare(strict_types=1);

namespace Core\Common\Entity;

use Core\Common\Adapter;

abstract class BoolValueObject extends BaseValueObject implements BoolValueObjectInterface
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
        return parent::getValue();
    }
}
