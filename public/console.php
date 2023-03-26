<?php

declare(strict_types=1);

use Symfony\Component\Console\Application;
use VasilDakov\MySupply\Application\Command\CreateAuctionsCommand;

chdir(dirname(__DIR__));
include __DIR__ . '/../vendor/autoload.php';

$application = new Application();
$application->add(new CreateAuctionsCommand());

$application->run();

