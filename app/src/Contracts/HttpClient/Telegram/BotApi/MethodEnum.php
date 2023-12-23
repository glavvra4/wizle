<?php

declare(strict_types=1);

namespace App\Contracts\HttpClient\Telegram\BotApi;

enum MethodEnum implements MethodEnumInterface
{
    case getUpdates;
    case setWebhook;
    case deleteWebhook;
    case getWebhookInfo;
    case getMe;

    case sendMessage;

    public function getName(): string
    {
        return $this->name;
    }
}
