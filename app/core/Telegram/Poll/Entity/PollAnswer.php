<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity;

use Core\Telegram\User\Entity\User;

readonly class PollAnswer implements PollAnswerInterface
{
    /**
     * @param Poll\Id $pollId
     * @param User $user
     * @param PollOptionIds $optionIds
     */
    public function __construct(
        public Poll\Id       $pollId,
        public User          $user,
        public PollOptionIds $optionIds
    )
    {
    }
}
