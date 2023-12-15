<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

use Core\Telegram\File\Entity\File;

class VideoNote implements VideoNoteInterface
{
    /**
     * @param File\Id $fileId
     * @param File\UniqueId $fileUniqueId
     * @param File\Dimension $length
     * @param File\Duration $duration
     * @param PhotoSizeInterface|null $thumbnail
     * @param File\Size|null $fileSize
     */
    public function __construct(
        protected File\Id $fileId,
        protected File\UniqueId $fileUniqueId,
        protected File\Dimension $length,
        protected File\Duration $duration,
        protected ?PhotoSizeInterface $thumbnail = null,
        protected ?File\Size $fileSize = null,
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
        return $this->length;
    }

    /**
     * @return File\Dimension
     */
    public function getHeight(): File\Dimension
    {
        return $this->length;
    }

    /**
     * @return File\Duration
     */
    public function getDuration(): File\Duration
    {
        return $this->duration;
    }

    /**
     * @return PhotoSizeInterface|null
     */
    public function getThumbnail(): ?PhotoSizeInterface
    {
        return $this->thumbnail;
    }

    /**
     * @return File\Size|null
     */
    public function getFileSize(): ?File\Size
    {
        return $this->fileSize;
    }
}
