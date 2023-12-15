<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\File\Duration;
use Core\Telegram\File\Entity\File\WithDurationInterface;
use Core\Telegram\File\Entity\File\WithNullableMimeTypeInterface;
use Core\Telegram\File\Entity\File\WithNullableSizeInterface;
use Core\Telegram\File\Entity\File\Id;
use Core\Telegram\File\Entity\File\IdentifiableInterface;
use Core\Telegram\File\Entity\File\MimeType;
use Core\Telegram\File\Entity\File\Size;
use Core\Telegram\File\Entity\File\UniqueId;

class Voice implements VoiceInterface
{
    /**
     * @param Id $fileId
     * @param UniqueId $fileUniqueId
     * @param Duration $duration
     * @param MimeType|null $mimeType
     * @param Size|null $fileSize
     */
    public function __construct(
        protected File\Id $fileId,
        protected File\UniqueId $fileUniqueId,
        protected File\Duration $duration,
        protected ?File\MimeType $mimeType = null,
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
     * @return File\Duration
     */
    public function getDuration(): File\Duration
    {
        return $this->duration;
    }

    /**
     * @return MimeType|null
     */
    public function getMimeType(): ?MimeType
    {
        return $this->mimeType;
    }

    /**
     * @return Size|null
     */
    public function getFileSize(): ?Size
    {
        return $this->fileSize;
    }
}
