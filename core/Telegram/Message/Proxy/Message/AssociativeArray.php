<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Proxy\Message;

use Core\Common\Proxy\BaseAssociativeArray;
use Core\Telegram\Chat\Entity\Chat;
use Core\Telegram\Chat\Proxy\Chat\AssociativeArray as ChatAssociativeArrayProxy;
use Core\Telegram\Chat\Entity\ChatInterface;
use Core\Telegram\Message\Entity\Message;
use Core\Telegram\Message\Entity\MessageInterface;
use DateTimeImmutable;

class AssociativeArray extends BaseAssociativeArray implements MessageInterface
{
    protected Message $message;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'message_id' => 'integer'
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMandatoryFields(): array
    {
        return [
            'message_id',
            'date',
            'chat'
        ];
    }

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->message = new Message(
            new Message\Id($data['message_id']),
            new Message\Date((new DateTimeImmutable())->setTimestamp($data['date'])),
            new ChatAssociativeArrayProxy($data['chat']),

        );
    }

    public function getId(): Message\Id
    {
        return $this->message->getId();
    }

    public function getDate(): Message\Date
    {
        return $this->message->getDate();
    }

    public function getChat(): ChatInterface
    {
        return $this->message->getChat();
    }
}
