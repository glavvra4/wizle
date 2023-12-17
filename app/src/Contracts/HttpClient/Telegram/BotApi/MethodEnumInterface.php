<?php

declare(strict_types=1);

namespace App\Contracts\HttpClient\Telegram\BotApi;

interface MethodEnumInterface
{
    public function getName(): string;
}
