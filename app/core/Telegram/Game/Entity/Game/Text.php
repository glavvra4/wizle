<?php

declare(strict_types=1);

namespace Core\Telegram\Game\Entity\Game;

use Core\Common\Entity\StringValueObject;

/** Brief description of the game or high scores included in the game message. Can be automatically edited to include current high scores for the game when the bot calls setGameScore, or manually edited using editMessageText. 0-4096 characters. */
class Text extends StringValueObject
{
}
