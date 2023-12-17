<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Proxy\Dice;

use Core\Telegram\Message\Entity\Dice;
use JetBrains\PhpStorm\ArrayShape;

readonly class AssociativeArray extends Dice
{
    public function __construct(
        #[ArrayShape([
            'emoji' => 'string',
            'value' => 'int',
        ])] array $data
    )
    {
        parent::__construct(
            new Dice\Emoji($data['emoji']),
            new Dice\Value($data['value'])
        );
    }
}
