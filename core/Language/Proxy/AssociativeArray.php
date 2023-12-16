<?php

declare(strict_types=1);

namespace Core\Language\Proxy;

use Core\Language\Entity\Language;
use JetBrains\PhpStorm\ArrayShape;

readonly class AssociativeArray extends Language
{
    public function __construct(
        #[ArrayShape([
            'title' => 'string',
            'subtag' => 'string'
        ])] array $data
    )
    {
        parent::__construct(
            new Language\Title($data['title']),
            new Language\Subtag($data['subtag'])
        );
    }
}
