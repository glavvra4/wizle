<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity;

interface PollOptionInterface
{
    public function getText(): PollOption\Text;
    public function getVoterCount(): PollOption\VoterCount;
}
