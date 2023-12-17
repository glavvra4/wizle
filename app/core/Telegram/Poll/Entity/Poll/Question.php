<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity\Poll;

use Core\Common\Entity\StringValueObject;
use Core\Telegram\Poll\Entity\Poll\Exception\InvalidQuestionException;

class Question extends StringValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);

        $length = mb_strlen($value);
        if ($length < 1 or $length > 300) {
            throw new InvalidQuestionException(
                sprintf("Poll Question length must be between 1 and 300 symbols, %d given", $length),
                0,
                $this
            );
        }
    }
}
