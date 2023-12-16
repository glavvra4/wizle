<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Entity\Invoice;

use Core\Common\Entity\StringValueObject;

/** Unique bot deep-linking parameter that can be used to generate this invoice */
class StartParameter extends StringValueObject
{
}
