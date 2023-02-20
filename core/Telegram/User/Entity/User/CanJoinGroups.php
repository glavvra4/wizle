<?php

declare(strict_types=1);

namespace Core\Telegram\User\Entity\User;

use Core\Common\Entity\BoolValueObject;

/** True, if the bot can be invited to groups */
final readonly class CanJoinGroups extends BoolValueObject
{
}
