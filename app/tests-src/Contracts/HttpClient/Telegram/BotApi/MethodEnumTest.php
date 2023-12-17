<?php

declare(strict_types=1);

namespace App\Tests\Contracts\HttpClient\Telegram\BotApi;

use App\Contracts\HttpClient\Telegram\BotApi\MethodEnum;
use PHPUnit\Framework\TestCase;

class MethodEnumTest extends TestCase
{
    public function testGetName():void
    {
        self::assertEquals(
            MethodEnum::getMe->name,
            MethodEnum::getMe->getName()
        );
    }
}
