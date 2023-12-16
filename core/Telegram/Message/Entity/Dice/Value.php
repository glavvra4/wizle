<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity\Dice;

use Core\Common\Entity\IntValueObject;

/** Value of the dice, 1-6 for “🎲”, “🎯” and “🎳” base emoji, 1-5 for “🏀” and “⚽” base emoji, 1-64 for “🎰” base emoji */
class Value extends IntValueObject
{
}
