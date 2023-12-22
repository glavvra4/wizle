<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity;

/** This object represents an animated emoji that displays a random value. */
class Dice implements DiceInterface
{
    /**
     * @param Dice\Emoji $emoji
     * @param Dice\Value $value
     */
    public function __construct(
        public readonly Dice\Emoji $emoji,
        public readonly Dice\Value $value,
    )
    {
    }
}
