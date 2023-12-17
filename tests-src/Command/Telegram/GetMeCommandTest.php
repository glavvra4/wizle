<?php

declare(strict_types=1);

namespace App\Tests\Command\Telegram;

use App\Command\Telegram\GetMeCommand;
use App\Contracts\HttpClient\Telegram\BotApi;
use Core\Telegram\User\Entity\User;
use JsonException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;

class GetMeCommandTest extends TestCase
{
    public function testSuccess(): void
    {
        $botApi = self::createMock(BotApi::class);
        $botApi->method('getMe')
            ->willReturn(new User(
                new User\Id(10),
                new User\IsBot(false),
                new User\FirstName('first_name')
            ));

        $command = new GetMeCommand($botApi);
        $commandTester = new CommandTester($command);

        self::assertEquals(
            Command::SUCCESS,
            $commandTester->execute([])
        );
    }

    public function testExitOnException(): void
    {
        $botApi = self::createMock(BotApi::class);
        $botApi->method('getMe')
            ->willThrowException(new JsonException());

        $command = new GetMeCommand($botApi);
        $commandTester = new CommandTester($command);

        self::assertEquals(
            Command::FAILURE,
            $commandTester->execute([])
        );
    }
}
