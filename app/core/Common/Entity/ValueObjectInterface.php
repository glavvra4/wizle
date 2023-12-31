<?php

declare(strict_types=1);

namespace Core\Common\Entity;

interface ValueObjectInterface
{
    public function getValue(): mixed;
}
