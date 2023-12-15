<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Adapter\PollOption;

use Core\Common\Adapter\BaseAssociativeArray;
use Core\Telegram\Poll\Entity\PollOption;
use Core\Telegram\Poll\Entity\PollOptionInterface;

class AssociativeArray extends BaseAssociativeArray implements PollOptionInterface
{
    protected PollOption $pollOption;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'text' => 'string',
            'voter_count' => 'integer'
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMandatoryFields(): array
    {
        return [
            'text',
            'voter_count'
        ];
    }

    /**
     * @param array{text: string, voter_count: int} $data
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->pollOption = new PollOption(
            new PollOption\Text($data['text']),
            new PollOption\VoterCount($data['voter_count'])
        );
    }

    /**
     * @return PollOption\Text
     */
    public function getText(): PollOption\Text
    {
        return $this->pollOption->getText();
    }

    /**
     * @return PollOption\VoterCount
     */
    public function getVoterCount(): PollOption\VoterCount
    {
        return $this->pollOption->getVoterCount();
    }
}
