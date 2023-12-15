<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity\File;

use Core\Telegram\File\Entity\PhotoSizeInterface;

interface WithNullableThumbnailInterface
{
    public function getThumbnail(): ?PhotoSizeInterface;
}
