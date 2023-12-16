<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

readonly class ChatPhoto implements ChatPhotoInterface
{
    public ChatPhoto\SmallFile $smallFile;
    public ChatPhoto\BigFile $bigFile;

    /**
     * @param File\Id $smallFileId
     * @param File\UniqueId $smallFileUniqueId
     * @param File\Id $bigFileId
     * @param File\UniqueId $bigFileUniqueId
     */
    public function __construct(
        File\Id       $smallFileId,
        File\UniqueId $smallFileUniqueId,
        File\Id       $bigFileId,
        File\UniqueId $bigFileUniqueId,
    )
    {
        $this->smallFile = new ChatPhoto\SmallFile($smallFileId, $smallFileUniqueId);
        $this->bigFile = new ChatPhoto\BigFile($bigFileId, $bigFileUniqueId);
    }
}
