<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity;

/** This object represents an animated emoji that displays a random value. */
readonly class Dice implements DiceInterface
{
    /**
     * @param Dice\Emoji $emoji
     * @param Dice\Value $value
     */
    public function __construct(
        public Dice\Emoji $emoji,
        public Dice\Value $value,
    )
    {
    }
}
