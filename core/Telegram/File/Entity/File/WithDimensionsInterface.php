<?php

declare(strict_types=1);

namespace Core\Telegram\File\Entity\File;

use Core\Telegram\File\Entity\File;

interface WithDimensionsInterface
{
    public function getWidth(): File\Dimension;
    public function getHeight(): File\Dimension;
}
