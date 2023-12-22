<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity;

use Core\Telegram\Message\Entity\MessageEntities;

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
     * @param MessageEntities|null $explanationEntities
     * @param Poll\OpenPeriod|null $openPeriod
     * @param Poll\Close|null $closeDate
     */
    public function __construct(
        public readonly Poll\Id                    $id,
        public readonly Poll\Question              $question,
        public readonly PollOptions                $options,
        public readonly Poll\TotalVoterCount       $totalVoterCount,
        public readonly Poll\IsClosed              $isClosed,
        public readonly Poll\IsAnonymous           $isAnonymous,
        public readonly Poll\Type                  $type,
        public readonly Poll\AllowsMultipleAnswers $allowsMultipleAnswers,
        public readonly ?PollOption\Id             $correctOptionId = null,
        public readonly ?Poll\Explanation          $explanation = null,
        public readonly ?MessageEntities           $explanationEntities = null,
        public readonly ?Poll\OpenPeriod           $openPeriod = null,
        public readonly ?Poll\Close                $closeDate = null,
    )
    {
    }
}
