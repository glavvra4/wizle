<?php

declare(strict_types=1);

namespace Core\Telegram\User\Entity\User;

use Core\Common\Entity\BoolValueObject;

/** True, if privacy mode is disabled for the bot */
final readonly class CanReadAllGroupMessages extends BoolValueObject
{
}
