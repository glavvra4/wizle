<?php

declare(strict_types=1);

namespace App\Tests\Contracts\HttpClient\Telegram;

use App\Contracts\HttpClient\Telegram\BotApi;
use JsonException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;

class BotApiTest extends TestCase
{
    /**
     * @return void
     *
     * @throws JsonException
     * @throws ExceptionInterface
     */
    public function testRequest(): void
    {
        $telegramHttpClient = new MockHttpClient([
            new MockResponse(json_encode([
                'result' => ['test']
            ]))
        ]);

        $botApi = new BotApi($telegramHttpClient);

        self::assertEquals(
            ['test'],
            $botApi->request(BotApi\MethodEnum::getMe)
        );
    }

    /**
     * @return void
     *
     * @throws JsonException
     * @throws ExceptionInterface
     */
    public function testGetUpdates(): void
    {
        $telegramHttpClient = new MockHttpClient([
            new MockResponse(json_encode([
                'result' => [
                    [
                        "update_id" => 10,
                    ]
                ]
            ]))
        ]);

        $botApi = new BotApi($telegramHttpClient);
        $updates = $botApi->getUpdates();

        self::assertEquals(
            10,
            $updates[0]->id->getValue()
        );
    }

    /**
     * @return void
     *
     * @throws JsonException
     * @throws ExceptionInterface
     */
    public function testGetMe(): void
    {
        $telegramHttpClient = new MockHttpClient([
            new MockResponse(json_encode([
                'result' => [
                    'id' => 10,
                    'is_bot' => false,
                    'first_name' => 'first_name',
                ]
            ]))
        ]);

        $botApi = new BotApi($telegramHttpClient);
        $user = $botApi->getMe();

        self::assertEquals(
            10,
            $user->id->getValue()
        );
    }
}
