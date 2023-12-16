<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity;

use Core\Telegram\Message\Entity\MessageEntities;

readonly class Poll implements PollInterface
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
     * @param MessageEntities|null $explanationEntities
     * @param Poll\OpenPeriod|null $openPeriod
     * @param Poll\Close|null $closeDate
     */
    public function __construct(
        public Poll\Id                    $id,
        public Poll\Question              $question,
        public PollOptions                $options,
        public Poll\TotalVoterCount       $totalVoterCount,
        public Poll\IsClosed              $isClosed,
        public Poll\IsAnonymous           $isAnonymous,
        public Poll\Type                  $type,
        public Poll\AllowsMultipleAnswers $allowsMultipleAnswers,
        public ?PollOption\Id             $correctOptionId = null,
        public ?Poll\Explanation          $explanation = null,
        public ?MessageEntities           $explanationEntities = null,
        public ?Poll\OpenPeriod           $openPeriod = null,
        public ?Poll\Close                $closeDate = null,
    )
    {
    }
}
