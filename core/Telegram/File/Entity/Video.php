<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

use Core\Telegram\File\Entity\File;

class Video implements VideoInterface
{
    /**
     * @param File\Id $fileId
     * @param File\UniqueId $fileUniqueId
     * @param File\Dimension $width
     * @param File\Dimension $height
     * @param File\Duration $duration
     * @param PhotoSizeInterface|null $thumbnail
     * @param File\Name|null $fileName
     * @param File\MimeType|null $mimeType
     * @param File\Size|null $fileSize
     */
    public function __construct(
        protected File\Id $fileId,
        protected File\UniqueId $fileUniqueId,
        protected File\Dimension $width,
        protected File\Dimension $height,
        protected File\Duration $duration,
        protected ?PhotoSizeInterface $thumbnail = null,
        protected ?File\Name $fileName = null,
        protected ?File\MimeType $mimeType = null,
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
     * @return File\Name|null
     */
    public function getFileName(): ?File\Name
    {
        return $this->fileName;
    }

    /**
     * @return File\MimeType|null
     */
    public function getMimeType(): ?File\MimeType
    {
        return $this->mimeType;
    }

    /**
     * @return File\Size|null
     */
    public function getFileSize(): ?File\Size
    {
        return $this->fileSize;
    }
}
