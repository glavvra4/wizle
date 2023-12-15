<?php

declare(strict_types=1);

namespace Core\Common\Entity;

use DateTimeImmutable;

abstract class DateTimeImmutableValueObject extends BaseValueObject implements DateTimeImmutableValueObjectInterface
{
    /**
     * @param DateTimeImmutable $value
     */
    public function __construct(DateTimeImmutable $value)
    {
        parent::__construct($value);
    }

    /**
     * @return DateTimeImmutable
     */
    public function getValue(): DateTimeImmutable
    {
        return parent::getValue();
    }
}
