<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity;

use Core\Telegram\User\Entity\UserInterface;

class PollAnswer implements PollAnswerInterface
{
    /**
     * @param Poll\Id $pollId
     * @param UserInterface $user
     * @param PollOptionIdsInterface $optionIds
     */
    public function __construct(
        protected Poll\Id $pollId,
        protected UserInterface $user,
        protected PollOptionIdsInterface $optionIds
    )
    {
    }

    /**
     * @return Poll\Id
     */
    public function getPollId(): Poll\Id
    {
        return $this->pollId;
    }

    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface
    {
        return $this->user;
    }

    /**
     * @return PollOptionIdsInterface
     */
    public function getOptionIds(): PollOptionIdsInterface
    {
        return $this->optionIds;
    }
}
