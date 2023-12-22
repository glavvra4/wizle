<?php

declare(strict_types=1);

namespace Core\Telegram\File\Proxy\PhotoSize;

use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\PhotoSize;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends PhotoSize
{
    public function __construct(
        #[ArrayShape([
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'width' => 'int',
            'height' => 'int',
            'file_size' => 'int'
        ])] array $data
    )
    {
        parent::__construct(
            new File\Id($data['file_id']),
            new File\UniqueId($data['file_unique_id']),
            new File\Dimension($data['width']),
            new File\Dimension($data['height']),
            isset($data['file_size'])
                ? new File\Size($data['file_size'])
                : null,
        );
    }
}
