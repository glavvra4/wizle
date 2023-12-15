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
        protected PollOption\Text $text,
        protected PollOption\VoterCount $voterCount
    )
    {
    }

    /**
     * @return PollOption\Text
     */
    public function getText(): PollOption\Text
    {
        return $this->text;
    }

    /**
     * @return PollOption\VoterCount
     */
    public function getVoterCount(): PollOption\VoterCount
    {
        return $this->voterCount;
    }
}
