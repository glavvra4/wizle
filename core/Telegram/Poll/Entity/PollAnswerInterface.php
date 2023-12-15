<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity;

use Core\Telegram\User\Entity\UserInterface;

interface PollAnswerInterface
{
    public function getPollId(): Poll\Id;
    public function getUser(): UserInterface;
    public function getOptionIds(): PollOptionIdsInterface;
}
