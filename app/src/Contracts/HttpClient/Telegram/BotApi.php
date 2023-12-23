<?php

declare(strict_types=1);

namespace App\Contracts\HttpClient\Telegram;

use App\Contracts\HttpClient\Telegram\BotApi\MethodEnumInterface;
use App\Contracts\HttpClient\Telegram\BotApi\MethodEnum;
use Core\Telegram\Chat\Entity\Chat;
use Core\Telegram\Chat\Entity\ForumTopic;
use Core\Telegram\Message\Entity\Message;
use Core\Telegram\Message\Proxy\Message\AssociativeArray as MessageAssociativeArrayProxy;
use Core\Telegram\Update\Entity\Updates;
use Core\Telegram\Update\Proxy\Updates\IndexedArray as UpdatesIndexedArrayProxy;
use Core\Telegram\User\Proxy\User\AssociativeArray as UserAssociativeArrayProxy;
use Core\Telegram\User\Entity\User;
use JsonException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface as HttpExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BotApi
{
    private Chat\Id $adminTelegramChatId;

    public function __construct(
        private readonly HttpClientInterface $telegramHttpClient,
        int $adminTelegramChatId
    )
    {
        $this->adminTelegramChatId = new Chat\Id($adminTelegramChatId);
    }

    /**
     * @throws HttpExceptionInterface
     * @throws JsonException
     */
    public function request(MethodEnumInterface $method, array $body = []): array
    {
        $response = $this->telegramHttpClient->request(
            Request::METHOD_POST,
            $method->getName(),
            ["body" => $body]
        );

        $responseData = json_decode(
            json: $response->getContent(),
            associative: true,
            flags: JSON_THROW_ON_ERROR
        );

        return $responseData['result'];
    }

    /**
     * @param int $offset
     * @param int $limit
     * @param int $timeout
     * @param array<string> $allowed_updates
     *
     * @return Updates
     *
     * @throws HttpExceptionInterface
     * @throws JsonException
     */
    public function getUpdates(
        int   $offset = 0,
        int   $limit = 100,
        int   $timeout = 0,
        array $allowed_updates = []
    ): Updates
    {
        return new UpdatesIndexedArrayProxy($this->request(
            method: MethodEnum::getUpdates,
            body: [
                'offset' => $offset,
                'limit' => $limit,
                'timeout' => $timeout,
                'allowed_updates' => $allowed_updates
            ]
        ));
    }

    /**
     * @return User
     *
     * @throws HttpExceptionInterface
     * @throws JsonException
     */
    public function getMe(): User
    {
        return new UserAssociativeArrayProxy($this->request(
            method: MethodEnum::getMe
        ));
    }

    /**
     * @param Chat\Id $chatId
     * @param Message\Text $text
     * @param ForumTopic\Id|null $messageThreadId
     *
     * @return Message
     *
     * @throws HttpExceptionInterface
     * @throws JsonException
     */
    public function sendMessage(
        Chat\Id $chatId,
        Message\Text $text,
        ?ForumTopic\Id $messageThreadId = null,
    ): Message
    {
        return new MessageAssociativeArrayProxy($this->request(
            method: MethodEnum::sendMessage,
            body: [
                'chat_id' => $chatId->getValue(),
                'text' => $text->getValue(),
                'message_thread_id' => $messageThreadId?->getValue()
            ]
        ));
    }

    /**
     * @param Message\Text $text
     *
     * @return Message
     *
     * @throws HttpExceptionInterface
     * @throws JsonException
     */
    public function sendAdminMessage(
        Message\Text $text,
    ): Message
    {
        return new MessageAssociativeArrayProxy($this->request(
            method: MethodEnum::sendMessage,
            body: [
                'chat_id' => $this->adminTelegramChatId->getValue(),
                'text' => $text->getValue(),
            ]
        ));
    }
}
