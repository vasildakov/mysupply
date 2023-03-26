<?php

declare(strict_types=1);

namespace VasilDakov\MySupply\Application\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use VasilDakov\MySupply\Application\Service\AuctionFactory;
use VasilDakov\MySupply\Application\Service\ReaderFactory;

/**
 * Class MyCommand
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
#[AsCommand(
    name: 'app:create-auctions',
    description: 'Creates auctions.',
    aliases: ['app:create-auctions'],
    hidden: false
)]
class CreateAuctionsCommand extends Command
{
    protected function configure()
    {
        $this
            ->addArgument(
                'file',
                InputArgument::REQUIRED,
                'The file name'
            )
            ->addArgument(
                'extension',
                InputArgument::REQUIRED,
                'The file extension'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $file = $input->getArgument('file');
        $extension = $input->getArgument('extension');

        try {
            $reader = (new ReaderFactory())($extension);

            $data = ($reader)($file, $extension);

            $auctions = (new AuctionFactory())($data);

            $i = 1;
            foreach ($auctions as $auction) {
                $table = new Table($output);
                $table->setHeaders([
                    [new TableCell("Negotiation {$i}", ['colspan' => $auction['colspan']])],
                    $auction['headers'],
                ]);
                $table->setRows($auction['rows']);
                $table->render();

                $i++;
            }
            return Command::SUCCESS;

        } catch (\Throwable $e) {
            $output->writeln('<error>[ERROR] '.$e->getMessage().'</error>');
            return Command::FAILURE;
        }
    }
}
