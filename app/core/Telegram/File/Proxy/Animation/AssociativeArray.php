<?php

declare(strict_types=1);

namespace Core\Telegram\File\Proxy\Animation;

use Core\Telegram\File\Entity\Animation;
use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Proxy\PhotoSize;
use JetBrains\PhpStorm\ArrayShape;

readonly class AssociativeArray extends Animation
{
    public function __construct(
        #[ArrayShape([
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'width' => 'int',
            'height' => 'int',
            'duration' => 'int',
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
            new File\Dimension($data['width']),
            new File\Dimension($data['height']),
            new File\Duration($data['duration']),
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
