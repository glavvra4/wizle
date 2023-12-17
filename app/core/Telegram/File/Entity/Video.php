<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

readonly class Video extends AbstractFile implements VideoInterface
{
    /**
     * @param File\Id $fileId
     * @param File\UniqueId $fileUniqueId
     * @param File\Dimension $width
     * @param File\Dimension $height
     * @param File\Duration $duration
     * @param PhotoSize|null $thumbnail
     * @param File\Name|null $fileName
     * @param File\MimeType|null $mimeType
     * @param File\Size|null $fileSize
     */
    public function __construct(
        File\Id               $fileId,
        File\UniqueId         $fileUniqueId,
        public File\Dimension $width,
        public File\Dimension $height,
        public File\Duration  $duration,
        public ?PhotoSize     $thumbnail = null,
        public ?File\Name     $fileName = null,
        public ?File\MimeType $mimeType = null,
        public ?File\Size     $fileSize = null
    )
    {
        parent::__construct(
            $fileId,
            $fileUniqueId
        );
    }
}