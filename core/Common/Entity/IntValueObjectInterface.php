<?php

declare(strict_types=1);

namespace Core\Common\Entity;

interface IntValueObjectInterface extends ValueObjectInterface
{
    public function getValue(): int;
}
