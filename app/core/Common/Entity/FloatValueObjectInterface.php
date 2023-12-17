<?php

declare(strict_types=1);

namespace Core\Common\Entity;

interface FloatValueObjectInterface extends ValueObjectInterface
{
    public function getValue(): float;
}
