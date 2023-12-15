<?php

declare(strict_types=1);

namespace Core\Common\Entity;

use DateInterval;

abstract class DateIntervalValueObject extends BaseValueObject implements DateIntervalValueObjectInterface
{
    /**
     * @param DateInterval $value
     */
    public function __construct(DateInterval $value)
    {
        parent::__construct($value);
    }

    /**
     * @return DateInterval
     */
    public function getValue(): DateInterval
    {
        return parent::getValue();
    }
}
