<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

class PhotoSize extends AbstractFile implements PhotoSizeInterface
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
        readonly public File\Dimension $width,
        readonly public File\Dimension $height,
        readonly public ?File\Size     $fileSize = null
    )
    {
        parent::__construct(
            $fileId,
            $fileUniqueId
        );
    }
}
