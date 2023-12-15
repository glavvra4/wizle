<?php

declare(strict_types=1);

namespace Core\Telegram\Update\Entity\Update;

use Core\Common\Entity\IntValueObject;

/** The update's unique identifier. Update identifiers start from a certain positive number and increase sequentially. If there are no new updates for at least a week, then identifier of the next update will be chosen randomly instead of sequentially. */
class Id extends IntValueObject
{
}
