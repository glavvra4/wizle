<?php

declare(strict_types=1);

namespace Core\Telegram\User\Entity\User;

use Core\Common\Entity\BoolValueObject;

/** True, if this user is a bot */
final readonly class IsBot extends BoolValueObject
{
}
