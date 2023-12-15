<?php

declare(strict_types=1);

namespace Core\Common\Entity;

use Core\Common\Proxy;

abstract class BaseValueObject implements ValueObjectInterface
{
    /**
     * @param mixed $value
     */
    public function __construct(
        protected mixed $value
    )
    {
    }

    /**
     * @return mixed
     */
    public function getValue(): mixed
    {
        return $this->value;
    }
}
