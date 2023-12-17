<?php

declare(strict_types=1);

namespace Core\Common\Entity;

interface StringValueObjectInterface extends ValueObjectInterface
{
    public function getValue(): string;
}
