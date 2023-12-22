<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

class VideoNote extends AbstractFile implements VideoNoteInterface
{
    /**
     * @param File\Id $fileId
     * @param File\UniqueId $fileUniqueId
     * @param File\Dimension $length
     * @param File\Duration $duration
     * @param PhotoSize|null $thumbnail
     * @param File\Size|null $fileSize
     */
    public function __construct(
        File\Id               $fileId,
        File\UniqueId         $fileUniqueId,
        public readonly File\Dimension $length,
        public readonly File\Duration  $duration,
        public readonly ?PhotoSize     $thumbnail = null,
        public readonly ?File\Size     $fileSize = null,
    )
    {
        parent::__construct(
            $fileId,
            $fileUniqueId
        );
    }
}
