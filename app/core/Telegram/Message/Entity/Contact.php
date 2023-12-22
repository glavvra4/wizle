<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity;

use Core\Telegram\User\Entity\User;

/** This object represents a phone contact. */
class Contact implements ContactInterface
{
    /**
     * @param Contact\PhoneNumber $phoneNumber
     * @param Contact\FirstName $firstName
     * @param Contact\LastName|null $lastName
     * @param User\Id|null $userId
     * @param Contact\VCard|null $vCard
     */
    public function __construct(
        public readonly Contact\PhoneNumber $phoneNumber,
        public readonly Contact\FirstName $firstName,
        public readonly ?Contact\LastName $lastName = null,
        public readonly ?User\Id $userId = null,
        public readonly ?Contact\VCard $vCard = null,
    )
    {
    }
}
