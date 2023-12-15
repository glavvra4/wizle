<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity\File;

use Core\Telegram\File\Entity\File;

interface IdentifiableInterface
{
    public function getFileId(): File\Id;
    public function getFileUniqueId(): File\UniqueId;
}
