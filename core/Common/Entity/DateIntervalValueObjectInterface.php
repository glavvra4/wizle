<?php

declare(strict_types=1);

namespace Core\Common\Entity;

use DateInterval;

interface DateIntervalValueObjectInterface extends ValueObjectInterface
{
    public function getValue(): DateInterval;
}
