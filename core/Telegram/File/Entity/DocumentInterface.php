<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

use Core\Telegram\File\Entity\File;

interface DocumentInterface extends File\IdentifiableInterface, File\WithNullableThumbnailInterface, File\WithNullableNameInterface, File\WithNullableMimeTypeInterface, File\WithNullableSizeInterface
{
}
