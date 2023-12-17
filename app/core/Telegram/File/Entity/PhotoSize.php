<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

readonly class PhotoSize extends AbstractFile implements PhotoSizeInterface
{
    /**
     * @param File\Id $fileId
     * @param File\UniqueId $fileUniqueId
     * @param File\Dimension $width
     * @param File\Dimension $height
     * @param File\Size|null $fileSize
     */
    public function __construct(
        File\Id               $fileId,
        File\UniqueId         $fileUniqueId,
        public File\Dimension $width,
        public File\Dimension $height,
        public ?File\Size     $fileSize = null
    )
    {
        parent::__construct(
            $fileId,
            $fileUniqueId
        );
    }
}
