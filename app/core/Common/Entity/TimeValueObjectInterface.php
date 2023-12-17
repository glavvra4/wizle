<?php

declare(strict_types=1);

namespace Core\Common\Entity;

interface TimeValueObjectInterface extends IntValueObjectInterface
{
    public function getValue(): int;
}
