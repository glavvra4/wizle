<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Entity;

use ArrayAccess;
use Iterator;

interface LabeledPricesInterface extends ArrayAccess, Iterator
{
}
