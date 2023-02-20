<?php

declare(strict_types=1);

namespace Core\Common\Entity;

interface BoolValueObjectInterface extends ValueObjectInterface
{
    public function getValue(): bool;
}
