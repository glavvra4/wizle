<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity\PollOption;

use Core\Common\Entity\StringValueObject;
use Core\Telegram\Poll\Entity\PollOption\Exception\InvalidTextException;

class Text extends StringValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);

        $length = mb_strlen($value);
        if ($length < 1 or $length > 100) {
            throw new InvalidTextException(
                sprintf("Poll option Text length must be between 1 and 100 symbols, %d given", $length),
                0,
                $this
            );
        }
    }
}
