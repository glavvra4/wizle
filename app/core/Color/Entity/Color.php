<?php

declare(strict_types=1);

namespace Core\Color\Entity;

use Core\Color\Entity\Exception\InvalidColorException;
use Core\Common\Entity\IntValueObject;

/**
 * Value object for Color
 */
class Color extends IntValueObject implements ColorInterface
{
    /**
     * @param int $value RGB-format color (0x000000 to 0xffffff)
     *
     * @throws InvalidColorException if value is not in the correct interval (0x000000 to 0xffffff)
     */
    public function __construct(
        int $value
    )
    {
        parent::__construct($value);

        if ($value < 0 || $value > 16777215) {
            throw new InvalidColorException(
                sprintf("Integer RGB-format color must be a number between 0x000000 and 0xffffff, 0x%s given", $value),
                0,
                $this
            );
        }
    }

    /**
     * @return int RGB-color (0x000000 to 0xffffff)
     */
    public function getValue(): int
    {
        return parent::getValue();
    }

    /**
     * @return int red color (0x00 to 0xff)
     */
    public function getRed(): int
    {
        return ($this->value & 0xff0000) >> 16;
    }

    /**
     * @return int green color (0x00 to 0xff)
     */
    public function getGreen(): int
    {
        return ($this->value & 0x00ff00) >> 8;
    }

    /**
     * @return int blue color (0x00 to 0xff)
     */
    public function getBlue(): int
    {
        return $this->value & 0x0000ff;
    }
}
