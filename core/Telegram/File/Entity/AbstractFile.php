<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

abstract readonly class AbstractFile
{
    /**
     * @param File\Id $fileId
     * @param File\UniqueId $fileUniqueId
     */
    public function __construct(
        public File\Id       $fileId,
        public File\UniqueId $fileUniqueId,
    )
    {
    }
}
