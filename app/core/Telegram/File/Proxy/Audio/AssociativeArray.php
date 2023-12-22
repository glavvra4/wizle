<?php

declare(strict_types=1);

namespace Core\Telegram\File\Proxy\Audio;

use Core\Telegram\File\Entity\Audio;
use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Proxy\PhotoSize;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends Audio
{
    public function __construct(
        #[ArrayShape([
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'duration' => 'int',
            'performer' => 'string',
            'title' => 'string',
            'file_name' => 'string',
            'mime_type' => 'string',
            'file_size' => 'int',
            'thumbnail' => 'array'
        ])] array $data
    )
    {
        parent::__construct(
            new File\Id($data['file_id']),
            new File\UniqueId($data['file_unique_id']),
            new File\Duration($data['duration']),
            isset($data['performer'])
                ? new Audio\Performer($data['performer'])
                : null,
            isset($data['title'])
                ? new Audio\Title($data['title'])
                : null,
            isset($data['file_name'])
                ? new File\Name($data['file_name'])
                : null,
            isset($data['mime_type'])
                ? new File\MimeType($data['mime_type'])
                : null,
            isset($data['file_size'])
                ? new File\Size($data['file_size'])
                : null,
            isset($data['thumbnail'])
                ? new PhotoSize\AssociativeArray($data['thumbnail'])
                : null,
        );
    }
}
