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
class CreateAuctionCommand extends Command
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

            // at this point the result is just an array with auctions
            // after implementing the algorithm for building the auctions
            // they will appear here
            $result = ($reader)($file, $extension);

            // this is just a test with static data, showing how the output
            // table should look like in the console
            foreach ($result['items'] as $item) {
                $table = new Table($output);
                $table
                    ->setHeaders(
                        [new TableCell('Negotiation 1', ['colspan' => 4])],
                        ['Requested Item', 'Offer A', 'Offer B', 'Offer C'],
                    )
                    ->setRows([
                        ['100 tons of steel', '€200000', '€190000', '€195000'],
                        ['50 tons of nickel', '€400000', '€380000', '€390000'],
                    ])
                ;
                $table->render();
            }

            return Command::SUCCESS;

        } catch (\Throwable $e) {
            $output->writeln('<error>[ERROR] '.$e->getMessage().'</error>');
            return Command::FAILURE;
        }
    }
}
