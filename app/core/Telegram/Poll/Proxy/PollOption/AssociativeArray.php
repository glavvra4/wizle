<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Proxy\PollOption;

use Core\Telegram\Poll\Entity\PollOption;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends PollOption
{
    public function __construct(
        #[ArrayShape([
            'text' => 'string',
            'voter_count' => 'integer'
        ])] array $data
    )
    {
        parent::__construct(
            new PollOption\Text($data['text']),
            new PollOption\VoterCount($data['voter_count'])
        );
    }
}
