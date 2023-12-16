<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity;

use Core\Telegram\User\Entity\User;

readonly class Contact implements MessageEntityInterface
{
    /**
     * @param Contact\PhoneNumber $phoneNumber
     * @param Contact\FirstName $firstName
     * @param Contact\LastName|null $lastName
     * @param User\Id|null $userId
     * @param Contact\VCard|null $vCard
     */
    public function __construct(
        public Contact\PhoneNumber $phoneNumber,
        public Contact\FirstName $firstName,
        public ?Contact\LastName $lastName = null,
        public ?User\Id $userId = null,
        public ?Contact\VCard $vCard = null,
    )
    {
    }
}
