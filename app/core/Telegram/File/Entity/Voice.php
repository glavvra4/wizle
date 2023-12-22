<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

class Voice extends AbstractFile implements VoiceInterface
{
    /**
     * @param File\Id $fileId
     * @param File\UniqueId $fileUniqueId
     * @param File\Duration $duration
     * @param File\MimeType|null $mimeType
     * @param File\Size|null $fileSize
     */
    public function __construct(
        File\Id               $fileId,
        File\UniqueId         $fileUniqueId,
        public readonly File\Duration  $duration,
        public readonly ?File\MimeType $mimeType = null,
        public readonly ?File\Size     $fileSize = null,
    )
    {
        parent::__construct(
            $fileId,
            $fileUniqueId
        );
    }
}
