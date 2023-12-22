<?php

declare(strict_types=1);

namespace Core\Telegram\File\Proxy\File;

use Core\Telegram\File\Entity\File;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends File
{
    public function __construct(
        #[ArrayShape([
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'file_size' => 'int',
            'file_path' => 'string'
        ])] array $data
    )
    {
        parent::__construct(
            new File\Id($data['file_id']),
            new File\UniqueId($data['file_unique_id']),
            isset($data['file_size'])
                ? new File\Size($data['file_size'])
                : null,
            isset($data['file_path'])
                ? new File\Path($data['file_path'])
                : null,
        );
    }
}
