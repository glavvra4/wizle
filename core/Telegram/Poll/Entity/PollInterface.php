<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity;

use Core\Telegram\Message\Entity\MessageEntitiesInterface;

interface PollInterface
{
    public function getId(): Poll\Id;
    public function getQuestion(): Poll\Question;
    public function getOptions(): PollOptionsInterface;
    public function getTotalVoterCount(): Poll\TotalVoterCount;
    public function getIsClosed(): Poll\IsClosed;
    public function getIsAnonymous(): Poll\IsAnonymous;
    public function getType(): Poll\Type;
    public function getAllowsMultipleAnswers(): Poll\AllowsMultipleAnswers;
    public function getCorrectOptionId(): ?PollOption\Id;
    public function getExplanation(): ?Poll\Explanation;
    public function getExplanationEntities(): ?MessageEntitiesInterface;
    public function getOpenPeriod(): ?Poll\OpenPeriod;
    public function getCloseDate(): ?Poll\CloseDate;
}
