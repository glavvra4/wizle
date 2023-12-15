<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity\ChatPhoto;

use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\File\IdentifiableInterface;

class BigFile implements IdentifiableInterface
{
    /**
     * @param File\Id $fileId
     * @param File\UniqueId $fileUniqueId
     */
    public function __construct(
        protected File\Id $fileId,
        protected File\UniqueId $fileUniqueId
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
}
