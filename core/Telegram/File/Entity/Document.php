<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

use Core\Telegram\File\Entity\File;

class Document implements DocumentInterface
{
    /**
     * @param File\Id $fileId
     * @param File\UniqueId $fileUniqueId
     * @param PhotoSizeInterface|null $thumbnail
     * @param File\Name|null $fileName
     * @param File\MimeType|null $mimeType
     * @param File\Size|null $fileSize
     */
    public function __construct(
        protected File\Id $fileId,
        protected File\UniqueId $fileUniqueId,
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
