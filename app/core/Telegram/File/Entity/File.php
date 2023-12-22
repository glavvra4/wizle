<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

class File extends AbstractFile implements FileInterface
{
    /**
     * @param File\Id $fileId
     * @param File\UniqueId $fileUniqueId
     * @param File\Size|null $fileSize
     * @param File\Path|null $filePath
     */
    public function __construct(
        File\Id           $fileId,
        File\UniqueId     $fileUniqueId,
        public readonly ?File\Size $fileSize = null,
        public readonly ?File\Path $filePath = null,
    )
    {
        parent::__construct(
            $fileId,
            $fileUniqueId
        );
    }
}
