<?php

declare(strict_types=1);

namespace App\Command\Telegram;

use App\Contracts\HttpClient\Telegram\BotApi;
use App\Event\Telegram\UpdateEvent;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Throwable;

class GetUpdatesCommand extends Command
{
    public function __construct(
        private readonly EventDispatcherInterface $eventDispatcher,
        private readonly BotApi                   $telegram,
        string                                    $name = 'telegram:handle-updates'
    )
    {
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setDescription('Handles a Telegram updates via long polling');
        $this->setAliases([
            'tg:handle-updates'
        ]);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title("Starting a telegram update handling");

        $lastUpdateId = -1;
        while (true) {
            try {
                $updates = $this->telegram->getUpdates(
                    offset: $lastUpdateId + 1,
                    timeout: 30
                );

                $io->text(sprintf('Handled %d updates', count($updates)));

                foreach ($updates as $update) {
                    $lastUpdateId = $update->id->getValue();
                    $this->eventDispatcher->dispatch(new UpdateEvent($update), UpdateEvent::NAME);
                }
            } catch (Throwable $e) {
                $io->error($e->getMessage());
                break;
            }
        }

        return Command::FAILURE;
    }
}
