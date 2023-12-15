<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity\Poll;

use Core\Common\Entity\StringValueObject;
use Core\Telegram\Poll\Entity\Poll\Exception\InvalidExplanationException;
use Core\Telegram\Poll\Entity\Poll\Exception\InvalidQuestionException;

class Explanation extends StringValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);

        $length = mb_strlen($value);
        if ($length < 0 or $length > 200) {
            throw new InvalidExplanationException(
                sprintf("Poll Explanation length must be between 0 and 200 symbols, %d given", $length),
                0,
                $this
            );
        }
    }
}
