<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity;

use Core\Telegram\User\Entity\User;

class PollAnswer implements PollAnswerInterface
{
    /**
     * @param Poll\Id $pollId
     * @param User $user
     * @param PollOptionIds $optionIds
     */
    public function __construct(
        public readonly Poll\Id       $pollId,
        public readonly User          $user,
        public readonly PollOptionIds $optionIds
    )
    {
    }
}
