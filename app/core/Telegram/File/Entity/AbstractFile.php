<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

abstract class AbstractFile
{
    /**
     * @param File\Id $fileId
     * @param File\UniqueId $fileUniqueId
     */
    public function __construct(
        public readonly File\Id       $fileId,
        public readonly File\UniqueId $fileUniqueId,
    )
    {
    }
}
