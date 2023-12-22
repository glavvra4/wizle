<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Proxy\Poll;

use Core\Telegram\Message\Proxy\MessageEntities\IndexedArray as MessageEntitiesIndexedArrayProxy;
use Core\Telegram\Poll\Entity\Poll;
use Core\Telegram\Poll\Entity\PollOption;
use Core\Telegram\Poll\Proxy\PollOptions\IndexedArray as PollOptionsIndexedArrayProxy;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends Poll
{
    public function __construct(
        #[ArrayShape([
            'id' => 'string',
            'question' => 'string',
            'options' => 'array',
            'total_voter_count' => 'int',
            'is_closed' => 'bool',
            'is_anonymous' => 'bool',
            'type' => 'string',
            'allows_multiple_answers' => 'bool',
            'correct_option_id' => 'int',
            'explanation' => 'string',
            'explanation_entities' => 'array',
            'open_period' => 'int',
            'close_date' => 'int'
        ])] array $data
    )
    {
        parent::__construct(
            new Poll\Id($data['id']),
            new Poll\Question($data['question']),
            new PollOptionsIndexedArrayProxy($data['options']),
            new Poll\TotalVoterCount($data['total_voter_count']),
            new Poll\IsClosed($data['is_closed']),
            new Poll\IsAnonymous($data['is_anonymous']),
            new Poll\Type($data['type']),
            new Poll\AllowsMultipleAnswers($data['allows_multiple_answers']),
            isset($data['correct_option_id'])
                ? new PollOption\Id($data['correct_option_id'])
                : null,
            isset($data['explanation'])
                ? new Poll\Explanation($data['explanation'])
                : null,
            isset($data['explanation_entities'])
                ? new MessageEntitiesIndexedArrayProxy($data['explanation_entities'])
                : null,
            isset($data['open_period'])
                ? new Poll\OpenPeriod($data['open_period'])
                : null,
            isset($data['close_date'])
                ? new Poll\Close($data['close_date'])
                : null,
        );
    }
}
