<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Proxy\PollAnswer;

use Core\Common\Proxy\BaseAssociativeArray;
use Core\Telegram\Poll\Proxy\PollOptionIds\IndexedArray as OptionIdsIndexedArrayProxy;
use Core\Telegram\Poll\Entity\Poll;
use Core\Telegram\Poll\Entity\PollAnswer;
use Core\Telegram\Poll\Entity\PollAnswerInterface;
use Core\Telegram\Poll\Entity\PollOptionIdsInterface;
use Core\Telegram\User\Proxy\User\AssociativeArray as UserAssociativeArrayProxy;
use Core\Telegram\User\Entity\UserInterface;

class AssociativeArray extends BaseAssociativeArray implements PollAnswerInterface
{
    protected PollAnswerInterface $pollAnswer;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'poll_id' => 'string',
            'user' => 'array',
            'option_ids' => 'array'
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMandatoryFields(): array
    {
        return [
            'poll_id',
            'user',
            'option_ids'
        ];
    }

    /**
     * @param array{poll_id: string, user: array, option_ids: array<int>} $data
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->pollAnswer = new PollAnswer(
            new Poll\Id($data['poll_id']),
            new UserAssociativeArrayProxy($data['user']),
            new OptionIdsIndexedArrayProxy($data['option_ids'])
        );
    }

    public function getPollId(): Poll\Id
    {
        return $this->pollAnswer->getPollId();
    }

    public function getUser(): UserInterface
    {
        return $this->pollAnswer->getUser();
    }

    public function getOptionIds(): PollOptionIdsInterface
    {
        return $this->pollAnswer->getOptionIds();
    }
}
