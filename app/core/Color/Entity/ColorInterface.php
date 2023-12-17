<?php

declare(strict_types=1);

namespace Core\Color\Entity;

use Core\Common\Entity\IntValueObjectInterface;

interface ColorInterface extends IntValueObjectInterface
{
    public function getRed(): int;

    public function getBlue(): int;

    public function getGreen(): int;
}
