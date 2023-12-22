<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity;

class PollOption implements PollOptionInterface
{
    /**
     * @param PollOption\Text $text
     * @param PollOption\VoterCount $voterCount
     */
    public function __construct(
        public readonly PollOption\Text       $text,
        public readonly PollOption\VoterCount $voterCount
    )
    {
    }
}
