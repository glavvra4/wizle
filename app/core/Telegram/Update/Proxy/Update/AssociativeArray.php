<?php

declare(strict_types=1);

namespace Core\Telegram\Update\Proxy\Update;

use Core\Telegram\Message\Proxy\Message\AssociativeArray as MessageAssociativeArrayProxy;
use Core\Telegram\Update\Entity\Update;
use JetBrains\PhpStorm\ArrayShape;

class AssociativeArray extends Update
{

    public function __construct(
        #[ArrayShape([
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
        ])] array $data
    )
    {
        parent::__construct(
            new Update\Id($data['update_id']),
            isset($data['message'])
                ? new MessageAssociativeArrayProxy($data['message'])
                : null,
            isset($data['edited_message'])
                ? new MessageAssociativeArrayProxy($data['edited_message'])
                : null,
            isset($data['channel_post'])
                ? new MessageAssociativeArrayProxy($data['channel_post'])
                : null,
            isset($data['edited_channel_post'])
                ? new MessageAssociativeArrayProxy($data['edited_channel_post'])
                : null,
        );
    }
}
