<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity;

readonly class PollOption implements PollOptionInterface
{
    /**
     * @param PollOption\Text $text
     * @param PollOption\VoterCount $voterCount
     */
    public function __construct(
        public PollOption\Text       $text,
        public PollOption\VoterCount $voterCount
    )
    {
    }
}
