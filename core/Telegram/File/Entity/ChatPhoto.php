<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

use Core\Telegram\File\Entity\ChatPhoto\BigFile;
use Core\Telegram\File\Entity\ChatPhoto\SmallFile;
use Core\Telegram\File\Entity\File;

class ChatPhoto implements ChatPhotoInterface
{
    protected SmallFile $smallFile;
    protected BigFile $bigFile;

    /**
     * @param File\Id $smallFileId
     * @param File\UniqueId $smallFileUniqueId
     * @param File\Id $bigFileId
     * @param File\UniqueId $bigFileUniqueId
     */
    public function __construct(
        File\Id $smallFileId,
        File\UniqueId $smallFileUniqueId,
        File\Id $bigFileId,
        File\UniqueId $bigFileUniqueId,
    )
    {
        $this->smallFile = new SmallFile($smallFileId, $smallFileUniqueId);
        $this->bigFile = new BigFile($bigFileId, $bigFileUniqueId);
    }

    /**
     * @return File\Id
     */
    public function getSmallFileId(): File\Id
    {
        return $this->smallFile->getFileId();
    }

    /**
     * @return File\UniqueId
     */
    public function getSmallFileUniqueId(): File\UniqueId
    {
        return $this->smallFile->getFileUniqueId();
    }

    /**
     * @return File\Id
     */
    public function getBigFileId(): File\Id
    {
        return $this->bigFile->getFileId();
    }

    /**
     * @return File\UniqueId
     */
    public function getBigFileUniqueId(): File\UniqueId
    {
        return $this->bigFile->getFileUniqueId();
    }
}
