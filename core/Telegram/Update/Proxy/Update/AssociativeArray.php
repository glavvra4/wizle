<?php

declare(strict_types=1);

namespace Core\Telegram\Update\Proxy\Update;

use Core\Common\Proxy\BaseAssociativeArray;
use Core\Telegram\Message\Proxy\Message\AssociativeArray as MessageAssociativeArrayProxy;
use Core\Telegram\Message\Entity\MessageInterface;
use Core\Telegram\Update\Entity\Update;
use Core\Telegram\Update\Entity\UpdateInterface;

class AssociativeArray extends BaseAssociativeArray implements UpdateInterface
{
    protected Update $update;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'update_id' => 'integer',
            'message' => 'array',
            'edited_message' => 'array',
            'channel_post' => 'array',
            'edited_channel_post' => 'array',
            'inline_query' => 'array',
            'chosen_inline_result' => 'array',
            'callback_query' => 'array',
            'shipping_query' => 'array',
            'pre_checkout_query' => 'array',
            'poll' => 'array',
            'poll_answer' => 'array',
            'my_chat_member' => 'array',
            'chat_member' => 'array',
            'chat_join_request' => 'array',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMandatoryFields(): array
    {
        return [
            'update_id'
        ];
    }

    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->update = new Update(
            new Update\Id($data['update_id']),
            (array_key_exists('message', $data) && $data['message'] !== null)
                ? new MessageAssociativeArrayProxy($data['message'])
                : null,
            (array_key_exists('edited_message', $data) && $data['edited_message'] !== null)
                ? new MessageAssociativeArrayProxy($data['edited_message'])
                : null,
            (array_key_exists('channel_post', $data) && $data['channel_post'] !== null)
                ? new MessageAssociativeArrayProxy($data['channel_post'])
                : null,
            (array_key_exists('edited_channel_post', $data) && $data['edited_channel_post'] !== null)
                ? new MessageAssociativeArrayProxy($data['edited_channel_post'])
                : null,
        );
    }

    public function getId(): Update\Id
    {
        return $this->update->getId();
    }

    public function getMessage(): ?MessageInterface
    {
        return $this->update->getMessage();
    }

    public function getEditedMessage(): ?MessageInterface
    {
        return $this->update->getEditedMessage();
    }

    public function getChannelPost(): ?MessageInterface
    {
        return $this->update->getChannelPost();
    }

    public function getEditedChannelPost(): ?MessageInterface
    {
        return $this->update->getEditedChannelPost();
    }
}
