<?php

declare(strict_types=1);

namespace Core\Telegram\Update\Entity;

use ArrayAccess;
use Countable;
use Iterator;

interface UpdatesInterface extends ArrayAccess, Iterator, Countable
{
}
