<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity;

use Core\Telegram\File\Entity\File;

interface VoiceInterface extends File\IdentifiableInterface, File\WithDurationInterface, File\WithNullableMimeTypeInterface, File\WithNullableSizeInterface
{
}
