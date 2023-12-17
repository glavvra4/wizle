<?php

declare(strict_types=1);

namespace App\Tests\Command\Telegram;

use App\Command\Telegram\GetMeCommand;
use App\Command\Telegram\GetUpdatesCommand;
use App\Contracts\HttpClient\Telegram\BotApi;
use App\Event\Telegram\UpdateEvent;
use Core\Telegram\Update\Entity\Update;
use Core\Telegram\Update\Entity\Updates;
use JsonException;
use PHPUnit\Framework\MockObject\Rule\InvokedCount;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class GetUpdatesCommandTest extends TestCase
{
    public function testSuccess(): void
    {
        $botApi = self::createMock(BotApi::class);
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $command = new GetUpdatesCommand($eventDispatcher, $botApi);
        $commandTester = new CommandTester($command);

        $botApi
            ->method('getUpdates')
            ->willReturn(
                new Updates([
                    new Update(
                        new Update\Id(10)
                    )
                ])
            );

        $eventDispatcher
            ->method('dispatch')
            ->willThrowException(new JsonException());

        $commandTester->execute([]);

        self::assertEquals(
            Command::FAILURE,
            $commandTester->execute([])
        );
    }
}
