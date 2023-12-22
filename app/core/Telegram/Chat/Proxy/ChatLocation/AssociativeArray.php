<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Proxy\ChatLocation;

use Core\Telegram\Chat\Entity\ChatLocation;
use Core\Telegram\Location\Proxy\Location\AssociativeArray as LocationAssociativeArrayProxy;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends ChatLocation
{
    public function __construct(
        #[ArrayShape([
            'location' => 'array',
            'address' => 'string'
        ])] array $data
    )
    {
        parent::__construct(
            new LocationAssociativeArrayProxy($data['location']),
            new ChatLocation\Address($data['address'])
        );
    }
}
