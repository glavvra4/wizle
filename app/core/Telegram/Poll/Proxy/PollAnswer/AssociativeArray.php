<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Proxy\PollAnswer;

use Core\Telegram\Poll\Entity\Poll;
use Core\Telegram\Poll\Entity\PollAnswer;
use Core\Telegram\Poll\Proxy\PollOptionIds\IndexedArray as OptionIdsIndexedArrayProxy;
use Core\Telegram\User\Proxy\User\AssociativeArray as UserAssociativeArrayProxy;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends PollAnswer
{
    public function __construct(
        #[ArrayShape([
            'poll_id' => 'string',
            'user' => 'array',
            'option_ids' => 'array'
        ])] array $data
    )
    {
        parent::__construct(
            new Poll\Id($data['poll_id']),
            new UserAssociativeArrayProxy($data['user']),
            new OptionIdsIndexedArrayProxy($data['option_ids'])
        );
    }
}
