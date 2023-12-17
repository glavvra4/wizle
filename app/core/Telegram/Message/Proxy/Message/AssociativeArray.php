<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Proxy\Message;

use Core\Telegram\Chat\Entity\ForumTopic;
use Core\Telegram\Chat\Proxy\Chat\AssociativeArray as ChatAssociativeArrayProxy;
use Core\Telegram\Message\Proxy\Message\AssociativeArray as MessageAssociativeArrayProxy;
use Core\Telegram\User\Proxy\User\AssociativeArray as UserAssociativeArrayProxy;
use Core\Telegram\Message\Entity\Message;
use JetBrains\PhpStorm\ArrayShape;

readonly class AssociativeArray extends Message
{
    public function __construct(
        #[ArrayShape([
            'message_id' =>	'int',
            'date' => 'int',
            'chat' => 'array',
            'message_thread_id' => 'int',
            'from' => 'array',
            'sender_chat' => 'array',
            'forward_from' => 'array',
            'forward_from_chat' => 'array',
            'forward_from_message_id' => 'int',
            'forward_signature' => 'string',
            'forward_sender_name' => 'string',
            'forward_date' => 'int',
            'is_topic_message' => 'bool',
            'is_automatic_forward' => 'bool',
            'reply_to_message' => 'array',
            'via_bot' => 'array',
            'edit_date' => 'int',
            'has_protected_content' => 'bool',
            'media_group_id' => 'string',
            'author_signature' => 'string',
            'text' => 'string',
            'entities' => 'array',
            'animation' => 'array',
            'audio' => 'array',
            'document' => 'array',
            'photo' => 'array',
            'sticker' => 'array',
            'story' => 'array',
            'video' => 'array',
            'video_note' => 'array',
            'voice' => 'array',
            'caption' => 'string',
            'caption_entities' => 'array',
            'has_media_spoiler' => 'bool',
            'contact' => 'array',
            'dice' => 'array',
            'game' => 'array',
            'poll' => 'array',
            'venue' => 'array',
            'location' => 'array',
            'new_chat_members' => 'array',
            'left_chat_member' => 'array',
            'new_chat_title' => 'string',
            'new_chat_photo' => 'array',
            'delete_chat_photo' => 'bool',
            'group_chat_created' => 'bool',
            'supergroup_chat_created' => 'bool',
            'channel_chat_created' => 'bool',
            'message_auto_delete_timer_changed' => 'array',
            'migrate_to_chat_id' => 'int',
            'migrate_from_chat_id' => 'int',
            'pinned_message' => 'array',
            'invoice' => 'array',
            'successful_payment' => 'array',
            'user_shared' => 'array',
            'chat_shared' => 'array',
            'connected_website' => 'string',
            'write_access_allowed' => 'array',
            'passport_data' => 'array',
            'proximity_alert_triggered' => 'array',
            'forum_topic_created' => 'array',
            'forum_topic_edited' => 'array',
            'forum_topic_closed' => 'array',
            'forum_topic_reopened' => 'array',
            'general_forum_topic_hidden' => 'array',
            'general_forum_topic_unhidden' => 'array',
            'video_chat_scheduled' => 'array',
            'video_chat_started' => 'array',
            'video_chat_ended' => 'array',
            'video_chat_participants_invited' => 'array',
            'web_app_data' => 'array',
            'reply_markup' => 'array',
        ])] array $data
    )
    {
        parent::__construct(
            new Message\Id($data['message_id']),
            new Message\Date($data['date']),
            new ChatAssociativeArrayProxy($data['chat']),
            isset($data['message_thread_id'])
                ? new ForumTopic\Id($data['message_thread_id'])
                : null,
            isset($data['from'])
                ? new UserAssociativeArrayProxy($data['from'])
                : null,
            isset($data['sender_chat'])
                ? new ChatAssociativeArrayProxy($data['sender_chat'])
                : null,
            isset($data['forward_from'])
                ? new UserAssociativeArrayProxy($data['forward_from'])
                : null,
            isset($data['forward_from_chat'])
                ? new ChatAssociativeArrayProxy($data['forward_from_chat'])
                : null,
            isset($data['forward_from_message_id'])
                ? new Message\Id($data['forward_from_message_id'])
                : null,
            isset($data['forward_signature'])
                ? new Message\ForwardSignature($data['forward_signature'])
                : null,
            isset($data['forward_sender_name'])
                ? new Message\ForwardSenderName($data['forward_sender_name'])
                : null,
            isset($data['forward_date'])
                ? new Message\ForwardDate($data['forward_date'])
                : null,
            isset($data['is_topic_message'])
                ? new Message\IsTopicMessage($data['is_topic_message'])
                : null,
            isset($data['is_automatic_forward'])
                ? new Message\IsAutomaticForward($data['is_automatic_forward'])
                : null,
            isset($data['reply_to_message'])
                ? new MessageAssociativeArrayProxy($data['reply_to_message'])
                : null,
            isset($data['via_bot'])
                ? new UserAssociativeArrayProxy($data['via_bot'])
                : null,
            isset($data['edit_date'])
                ? new Message\EditDate($data['edit_date'])
                : null,
            isset($data['has_protected_content'])
                ? new Message\HasProtectedContent($data['has_protected_content'])
                : null,
            isset($data['media_group_id'])
                ? new Message\MediaGroupId($data['media_group_id'])
                : null,
            isset($data['text'])
                ? new Message\Text($data['text'])
                : null,

        );
    }
}
