<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

use Core\Telegram\File\Entity\File;

interface VideoInterface extends File\IdentifiableInterface, File\WithDimensionsInterface, File\WithDurationInterface, File\WithNullableThumbnailInterface, File\WithNullableNameInterface, File\WithNullableMimeTypeInterface, File\WithNullableSizeInterface
{
}
