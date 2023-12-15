<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

use Core\Telegram\File\Entity\File;

interface PhotoSizeInterface extends File\IdentifiableInterface, File\WithDimensionsInterface, File\WithNullableSizeInterface
{
}
