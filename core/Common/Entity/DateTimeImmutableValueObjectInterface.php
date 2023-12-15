<?php

declare(strict_types=1);

namespace Core\Common\Entity;

use DateTimeImmutable;

interface DateTimeImmutableValueObjectInterface extends ValueObjectInterface
{
    public function getValue(): DateTimeImmutable;
}
