<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\File\MimeType;
use Core\Telegram\File\Entity\File\Name;
use Core\Telegram\File\Entity\File\Size;

class Audio implements AudioInterface
{
    /**
     * @param File\Id $fileId
     * @param File\UniqueId $fileUniqueId
     * @param File\Duration $duration
     * @param Audio\Performer|null $performer
     * @param Audio\Title|null $title
     * @param File\Name|null $fileName
     * @param File\MimeType|null $mimeType
     * @param File\Size|null $fileSize
     * @param PhotoSizeInterface|null $thumbnail
     */
    public function __construct(
        protected File\Id          $fileId,
        protected File\UniqueId    $fileUniqueId,
        protected File\Duration    $duration,
        protected ?Audio\Performer $performer = null,
        protected ?Audio\Title     $title = null,
        protected ?File\Name       $fileName = null,
        protected ?File\MimeType   $mimeType = null,
        protected ?File\Size       $fileSize = null,
        protected ?PhotoSizeInterface       $thumbnail = null,
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
     * @return File\Duration
     */
    public function getDuration(): File\Duration
    {
        return $this->duration;
    }

    /**
     * @return Audio\Performer|null
     */
    public function getPerformer(): ?Audio\Performer
    {
        return $this->performer;
    }

    /**
     * @return Audio\Title|null
     */
    public function getTitle(): ?Audio\Title
    {
        return $this->title;
    }

    /**
     * @return Name|null
     */
    public function getFileName(): ?File\Name
    {
        return $this->fileName;
    }

    /**
     * @return MimeType|null
     */
    public function getMimeType(): ?File\MimeType
    {
        return $this->mimeType;
    }

    /**
     * @return Size|null
     */
    public function getFileSize(): ?File\Size
    {
        return $this->fileSize;
    }

    /**
     * @return PhotoSizeInterface|null
     */
    public function getThumbnail(): ?PhotoSizeInterface
    {
        return $this->thumbnail;
    }
}
