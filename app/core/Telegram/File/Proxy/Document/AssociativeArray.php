<?php

declare(strict_types=1);

namespace Core\Telegram\File\Proxy\Document;

use Core\Telegram\File\Entity\Document;
use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Proxy\PhotoSize;
use JetBrains\PhpStorm\ArrayShape;

readonly class AssociativeArray extends Document
{
    public function __construct(
        #[ArrayShape([
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'thumbnail' => 'array',
            'file_name' => 'string',
            'mime_type' => 'string',
            'file_size' => 'int'
        ])] array $data
    )
    {
        parent::__construct(
            new File\Id($data['file_id']),
            new File\UniqueId($data['file_unique_id']),
            isset($data['thumbnail'])
                ? new PhotoSize\AssociativeArray($data['thumbnail'])
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
        );
    }
}
