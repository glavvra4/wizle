<?php

declare(strict_types=1);

namespace Core\Telegram\File\Proxy\VideoNote;

use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\VideoNote;
use Core\Telegram\File\Proxy\PhotoSize;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends VideoNote
{
    public function __construct(
        #[ArrayShape([
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'length' => 'int',
            'duration' => 'int',
            'thumbnail' => 'array',
            'file_size' => 'int'
        ])] array $data
    )
    {
        parent::__construct(
            new File\Id($data['file_id']),
            new File\UniqueId($data['file_unique_id']),
            new File\Dimension($data['length']),
            new File\Duration($data['duration']),
            isset($data['thumbnail'])
                ? new PhotoSize\AssociativeArray($data['thumbnail'])
                : null,
            isset($data['file_size'])
                ? new File\Size($data['file_size'])
                : null,
        );
    }
}
