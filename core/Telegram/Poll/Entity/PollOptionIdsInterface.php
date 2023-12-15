<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity;

use ArrayAccess;
use Iterator;

interface PollOptionIdsInterface extends ArrayAccess, Iterator
{
}
