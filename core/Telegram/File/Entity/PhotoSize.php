<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

use Core\Telegram\File\Entity\File;

class PhotoSize implements PhotoSizeInterface
{
    /**
     * @param File\Id $fileId
     * @param File\UniqueId $fileUniqueId
     * @param File\Dimension $width
     * @param File\Dimension $height
     * @param File\Size|null $fileSize
     */
    public function __construct(
        protected File\Id $fileId,
        protected File\UniqueId $fileUniqueId,
        protected File\Dimension $width,
        protected File\Dimension $height,
        protected ?File\Size $fileSize = null
    )
    {
    }

    /**
     * @return File\Id
     */
    public function getFileId(): File\Id
    {
        return $this->fileId;
    }

    /**
     * @return File\UniqueId
     */
    public function getFileUniqueId(): File\UniqueId
    {
        return $this->fileUniqueId;
    }

    /**
     * @return File\Dimension
     */
    public function getWidth(): File\Dimension
    {
        return $this->width;
    }

    /**
     * @return File\Dimension
     */
    public function getHeight(): File\Dimension
    {
        return $this->height;
    }

    /**
     * @return File\Size|null
     */
    public function getFileSize(): ?File\Size
    {
        return $this->fileSize;
    }
}
