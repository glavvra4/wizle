<?php

declare(strict_types=1);

namespace Core\Telegram\User\Entity\User;

use Core\Common\Entity\BoolValueObject;

/** True, if the bot supports inline queries */
final readonly class SupportsInlineQueries extends BoolValueObject
{
}
