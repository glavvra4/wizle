<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

use Core\Telegram\File\Entity\File;

interface AudioInterface extends File\IdentifiableInterface, File\WithDurationInterface, File\WithNullableNameInterface, File\WithNullableMimeTypeInterface, File\WithNullableSizeInterface, File\WithNullableThumbnailInterface
{
    public function getPerformer(): ?Audio\Performer;
    public function getTitle(): ?Audio\Title;
}
