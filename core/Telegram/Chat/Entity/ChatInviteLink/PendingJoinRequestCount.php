<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity\ChatInviteLink;

use Core\Common\Entity\IntValueObject;
use Core\Telegram\Chat\Entity\ChatInviteLink\Exception\InvalidPendingJoinRequestsCountException;

/** Value object for currency exponent separator */
class PendingJoinRequestCount extends IntValueObject
{
    /**
     * @param int $value Positive number
     *
     * @throws InvalidPendingJoinRequestsCountException if value is negative
     */
    public function __construct(int $value)
    {
        parent::__construct($value);

        if ($value < 0) {
            throw new InvalidPendingJoinRequestsCountException(
                sprintf("Chat Invite Link Pending Join Requests Count must be a positive number, %d given", $value),
                0,
                $this
            );
        }
    }

    /**
     * @return int Positive number
     */
    public function getValue(): int
    {
        return parent::getValue();
    }
}
