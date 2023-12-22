<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

class Audio extends AbstractFile implements AudioInterface
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
        public readonly File\Duration    $duration,
        public readonly ?Audio\Performer $performer = null,
        public readonly ?Audio\Title     $title = null,
        public readonly ?File\Name       $fileName = null,
        public readonly ?File\MimeType   $mimeType = null,
        public readonly ?File\Size       $fileSize = null,
        public readonly ?PhotoSize       $thumbnail = null,
    )
    {
        parent::__construct(
            $fileId,
            $fileUniqueId
        );
    }
}
