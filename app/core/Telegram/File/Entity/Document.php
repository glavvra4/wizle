<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

class Document extends AbstractFile implements DocumentInterface
{
    /**
     * @param File\Id $fileId
     * @param File\UniqueId $fileUniqueId
     * @param PhotoSize|null $thumbnail
     * @param File\Name|null $fileName
     * @param File\MimeType|null $mimeType
     * @param File\Size|null $fileSize
     */
    public function __construct(
        File\Id               $fileId,
        File\UniqueId         $fileUniqueId,
        public readonly ?PhotoSize     $thumbnail = null,
        public readonly ?File\Name     $fileName = null,
        public readonly ?File\MimeType $mimeType = null,
        public readonly ?File\Size     $fileSize = null
    )
    {
        parent::__construct(
            $fileId,
            $fileUniqueId
        );
    }
}
