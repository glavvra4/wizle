<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity;

use Core\Telegram\Message\Entity\MessageEntitiesInterface;

class Poll implements PollInterface
{
    /**
     * @param Poll\Id $id
     * @param Poll\Question $question
     * @param PollOptions $options
     * @param Poll\TotalVoterCount $totalVoterCount
     * @param Poll\IsClosed $isClosed
     * @param Poll\IsAnonymous $isAnonymous
     * @param Poll\Type $type
     * @param Poll\AllowsMultipleAnswers $allowsMultipleAnswers
     * @param PollOption\Id|null $correctOptionId
     * @param Poll\Explanation|null $explanation
     * @param MessageEntitiesInterface|null $explanationEntities
     * @param Poll\OpenPeriod|null $openPeriod
     * @param Poll\CloseDate|null $closeDate
     */
    public function __construct(
        protected Poll\Id                    $id,
        protected Poll\Question              $question,
        protected PollOptionsInterface       $options,
        protected Poll\TotalVoterCount       $totalVoterCount,
        protected Poll\IsClosed              $isClosed,
        protected Poll\IsAnonymous           $isAnonymous,
        protected Poll\Type                  $type,
        protected Poll\AllowsMultipleAnswers $allowsMultipleAnswers,
        protected ?PollOption\Id             $correctOptionId = null,
        protected ?Poll\Explanation          $explanation = null,
        protected ?MessageEntitiesInterface  $explanationEntities = null,
        protected ?Poll\OpenPeriod           $openPeriod = null,
        protected ?Poll\CloseDate            $closeDate = null,
    )
    {
    }

    /**
     * @return Poll\Id
     */
    public function getId(): Poll\Id
    {
        return $this->id;
    }

    /**
     * @return Poll\Question
     */
    public function getQuestion(): Poll\Question
    {
        return $this->question;
    }

    /**
     * @return PollOptionsInterface
     */
    public function getOptions(): PollOptionsInterface
    {
        return $this->options;
    }

    /**
     * @return Poll\TotalVoterCount
     */
    public function getTotalVoterCount(): Poll\TotalVoterCount
    {
        return $this->totalVoterCount;
    }

    /**
     * @return Poll\IsClosed
     */
    public function getIsClosed(): Poll\IsClosed
    {
        return $this->isClosed;
    }

    /**
     * @return Poll\IsAnonymous
     */
    public function getIsAnonymous(): Poll\IsAnonymous
    {
        return $this->isAnonymous;
    }

    /**
     * @return Poll\Type
     */
    public function getType(): Poll\Type
    {
        return $this->type;
    }

    /**
     * @return Poll\AllowsMultipleAnswers
     */
    public function getAllowsMultipleAnswers(): Poll\AllowsMultipleAnswers
    {
        return $this->allowsMultipleAnswers;
    }

    /**
     * @return PollOption\Id|null
     */
    public function getCorrectOptionId(): ?PollOption\Id
    {
        return $this->correctOptionId;
    }

    /**
     * @return Poll\Explanation|null
     */
    public function getExplanation(): ?Poll\Explanation
    {
        return $this->explanation;
    }

    /**
     * @return MessageEntitiesInterface|null
     */
    public function getExplanationEntities(): ?MessageEntitiesInterface
    {
        return $this->explanationEntities;
    }

    /**
     * @return Poll\OpenPeriod|null
     */
    public function getOpenPeriod(): ?Poll\OpenPeriod
    {
        return $this->openPeriod;
    }

    /**
     * @return Poll\CloseDate|null
     */
    public function getCloseDate(): ?Poll\CloseDate
    {
        return $this->closeDate;
    }
}
