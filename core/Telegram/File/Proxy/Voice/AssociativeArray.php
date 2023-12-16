<?php

declare(strict_types=1);

namespace Core\Telegram\File\Proxy\Voice;

use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\Voice;
use JetBrains\PhpStorm\ArrayShape;

readonly class AssociativeArray extends Voice
{
    public function __construct(
        #[ArrayShape([
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'duration' => 'int',
            'mime_type' => 'string',
            'file_size' => 'int'
        ])] array $data
    )
    {
        parent::__construct(
            new File\Id($data['file_id']),
            new File\UniqueId($data['file_unique_id']),
            new File\Duration($data['duration']),
            isset($data['mime_type'])
                ? new File\MimeType($data['mime_type'])
                : null,
            isset($data['file_size'])
                ? new File\Size($data['file_size'])
                : null,
        );
    }
}
