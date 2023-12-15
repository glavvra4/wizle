<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Proxy\Poll;

use Core\Common\Proxy\BaseAssociativeArray;
use Core\Telegram\Message\Proxy\MessageEntities\IndexedArray as MessageEntitiesIndexedArrayProxy;
use Core\Telegram\Message\Entity\MessageEntitiesInterface;
use Core\Telegram\Poll\Proxy\PollOptions\IndexedArray as PollOptionsIndexedArrayProxy;
use Core\Telegram\Poll\Entity\Poll;
use Core\Telegram\Poll\Entity\PollInterface;
use Core\Telegram\Poll\Entity\PollOption;
use Core\Telegram\Poll\Entity\PollOptionsInterface;
use DateInterval;
use DateTimeImmutable;
use Exception;

class AssociativeArray extends BaseAssociativeArray implements PollInterface
{
    protected Poll $poll;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'id' => 'string',
            'question' => 'string',
            'options' => 'array',
            'total_voter_count' => 'integer',
            'is_closed' => 'boolean',
            'is_anonymous' => 'boolean',
            'type' => 'string',
            'allows_multiple_answers' => 'boolean',
            'correct_option_id' => 'integer',
            'explanation' => 'string',
            'explanation_entities' => 'array',
            'open_period' => 'integer',
            'close_date' => 'integer'
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMandatoryFields(): array
    {
        return [
            'id',
            'question',
            'options',
            'total_voter_count',
            'is_closed',
            'is_anonymous',
            'type',
            'allows_multiple_answers'
        ];
    }

    /**
     * @param array{id: string, question: string, options: array, total_voter_count: integer, is_closed: boolean, is_anonymous: boolean, type: string, allows_multiple_answers: boolean, correct_option_id: integer, explanation: string, explanation_entities: array, open_period: integer, close_date: integer} $data
     *
     * @throws Exception
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->poll = new Poll(
            new Poll\Id($data['id']),
            new Poll\Question($data['question']),
            new PollOptionsIndexedArrayProxy($data['options']),
            new Poll\TotalVoterCount($data['total_voter_count']),
            new Poll\IsClosed($data['is_closed']),
            new Poll\IsAnonymous($data['is_anonymous']),
            new Poll\Type($data['type']),
            new Poll\AllowsMultipleAnswers($data['allows_multiple_answers']),
            (array_key_exists('correct_option_id', $data) && $data['correct_option_id'] !== null)
                ? new PollOption\Id($data['correct_option_id'])
                : null,
            (array_key_exists('explanation', $data) && $data['explanation'] !== null)
                ? new Poll\Explanation($data['explanation'])
                : null,
            (array_key_exists('explanation_entities', $data) && $data['explanation_entities'] !== null)
                ? new MessageEntitiesIndexedArrayProxy($data['explanation_entities'])
                : null,
            (array_key_exists('open_period', $data) && $data['open_period'] !== null)
                ? new Poll\OpenPeriod(new DateInterval('PT' . $data['open_period'] . 'S'))
                : null,
            (array_key_exists('close_date', $data) && $data['close_date'] !== null)
                ? new Poll\CloseDate((new DateTimeImmutable())->setTimestamp($data['close_date']))
                : null,
        );
    }

    public function getId(): Poll\Id
    {
        return $this->poll->getId();
    }

    public function getQuestion(): Poll\Question
    {
        return $this->poll->getQuestion();
    }

    public function getOptions(): PollOptionsInterface
    {
        return $this->poll->getOptions();
    }

    public function getTotalVoterCount(): Poll\TotalVoterCount
    {
        return $this->poll->getTotalVoterCount();
    }

    public function getIsClosed(): Poll\IsClosed
    {
        return $this->poll->getIsClosed();
    }

    public function getIsAnonymous(): Poll\IsAnonymous
    {
        return $this->poll->getIsAnonymous();
    }

    public function getType(): Poll\Type
    {
        return $this->poll->getType();
    }

    public function getAllowsMultipleAnswers(): Poll\AllowsMultipleAnswers
    {
        return $this->poll->getAllowsMultipleAnswers();
    }

    public function getCorrectOptionId(): ?PollOption\Id
    {
        return $this->poll->getCorrectOptionId();
    }

    public function getExplanation(): ?Poll\Explanation
    {
        return $this->poll->getExplanation();
    }

    public function getExplanationEntities(): ?MessageEntitiesInterface
    {
        return $this->poll->getExplanationEntities();
    }

    public function getOpenPeriod(): ?Poll\OpenPeriod
    {
        return $this->poll->getOpenPeriod();
    }

    public function getCloseDate(): ?Poll\CloseDate
    {
        return $this->poll->getCloseDate();
    }
}
