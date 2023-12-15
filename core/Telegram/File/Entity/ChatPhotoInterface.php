<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

interface ChatPhotoInterface
{
    public function getSmallFileId(): File\Id;
    public function getSmallFileUniqueId(): File\UniqueId;
    public function getBigFileId(): File\Id;
    public function getBigFileUniqueId(): File\UniqueId;
}
