<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

readonly class Audio extends AbstractFile implements AudioInterface
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
     * @param PhotoSize|null $thumbnail
     */
    public function __construct(
        File\Id                 $fileId,
        File\UniqueId           $fileUniqueId,
        public File\Duration    $duration,
        public ?Audio\Performer $performer = null,
        public ?Audio\Title     $title = null,
        public ?File\Name       $fileName = null,
        public ?File\MimeType   $mimeType = null,
        public ?File\Size       $fileSize = null,
        public ?PhotoSize       $thumbnail = null,
    )
    {
        parent::__construct(
            $fileId,
            $fileUniqueId
        );
    }
}
