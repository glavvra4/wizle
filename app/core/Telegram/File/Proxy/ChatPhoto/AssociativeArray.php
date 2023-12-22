<?php

declare(strict_types=1);

namespace Core\Telegram\File\Proxy\ChatPhoto;

use Core\Telegram\File\Entity\ChatPhoto;
use Core\Telegram\File\Entity\File;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends ChatPhoto
{
    public function __construct(
        #[ArrayShape([
            'small_file_id' => 'string',
            'small_file_unique_id' => 'string',
            'big_file_id' => 'string',
            'big_file_unique_id' => 'string'
        ])] array $data
    )
    {
        parent::__construct(
            new File\Id($data['small_file_id']),
            new File\UniqueId($data['small_file_unique_id']),
            new File\Id($data['big_file_id']),
            new File\UniqueId($data['big_file_unique_id'])
        );
    }
}
