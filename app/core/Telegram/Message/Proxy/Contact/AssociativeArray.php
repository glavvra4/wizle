<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Proxy\Contact;

use Core\Telegram\Message\Entity\Contact;
use Core\Telegram\User\Entity\User;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends Contact
{
    public function __construct(
        #[ArrayShape([
            'phone_number' => 'string',
            'first_name' => 'string',
            'last_name' => 'string',
            'user_id' => 'int',
            'vcard' => 'string'
        ])] array $data
    )
    {
        parent::__construct(
            new Contact\PhoneNumber($data['phone_number']),
            new Contact\FirstName($data['first_name']),
            isset($data['last_name'])
                ? new Contact\LastName($data['last_name'])
                : null,
            isset($data['user_id'])
                ? new User\Id($data['user_id'])
                : null,
            isset($data['vcard'])
                ? new Contact\VCard($data['vcard'])
                : null,
        );
    }
}
