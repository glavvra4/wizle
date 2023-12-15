<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity\ChatInviteLink;

use Core\Common\Entity\IntValueObject;
use Core\Telegram\Chat\Entity\ChatInviteLink\Exception\InvalidMemberLimitException;

/** Value object for currency exponent separator */
class MemberLimit extends IntValueObject
{
    /**
     * @param int $value Number between 1 and 99999
     *
     * @throws InvalidMemberLimitException if value is lower than 1 or is greater than 99999
     */
    public function __construct(int $value)
    {
        parent::__construct($value);

        if ($value < 1 or $value > 99999) {
            throw new InvalidMemberLimitException(
                sprintf("Chat Invite Link Member Limit value must be a number between 1 and 99999, %d given", $value),
                0,
                $this
            );
        }
    }

    /**
     * @return int Number between 1 and 99999
     */
    public function getValue(): int
    {
        return parent::getValue();
    }
}
