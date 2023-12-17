<?php

declare(strict_types=1);

namespace App\Command\Telegram;

use App\Contracts\HttpClient\Telegram\BotApi;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Throwable;

class GetMeCommand extends Command
{
    public function __construct(
        private readonly BotApi $telegram,
        string                  $name = 'telegram:get-me'
    )
    {
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setDescription('Gets information about current Telegram Bot');
        $this->setAliases([
            'tg:get-me'
        ]);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title("Getting information about current Bot");

        try {
            $user = $this->telegram->getMe();

            $io->listing([
                sprintf('Unique identifier: %s', $user->id->getValue()),
                sprintf('Is bot: %s', $user->isBot?->getValue() ? 'true' : 'false'),
                sprintf('First name: %s', $user->firstName->getValue()),
                sprintf('Username: %s', $user->username?->getValue()),
                sprintf('Can join groups: %s', (string)$user->canJoinGroups?->getValue() ? 'true' : 'false'),
                sprintf('Can read all group messages: %s', $user->canReadAllGroupMessages?->getValue() ? 'true' : 'false'),
                sprintf('Supports inline queries: %s', $user->supportsInlineQueries?->getValue() ? 'true' : 'false'),
            ]);
        } catch (Throwable $e) {
            $io->error($e->getMessage());
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
