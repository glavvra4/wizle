<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

readonly class File extends AbstractFile implements FileInterface
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
        public ?File\Size $fileSize = null,
        public ?File\Path $filePath = null,
    )
    {
        parent::__construct(
            $fileId,
            $fileUniqueId
        );
    }
}
