<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

readonly class VideoNote extends AbstractFile implements VideoNoteInterface
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
        public File\Dimension $length,
        public File\Duration  $duration,
        public ?PhotoSize     $thumbnail = null,
        public ?File\Size     $fileSize = null,
    )
    {
        parent::__construct(
            $fileId,
            $fileUniqueId
        );
    }
}
