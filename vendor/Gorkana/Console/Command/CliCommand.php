<?php

namespace Gorkana\Console\Command;

use Gorkana\Calculator as Calc;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Calculator CLI Command class
 *
 * @package      Gorkana\Calculator
 * @author       Balazs Csaba <csaba.balazs@evozon.com>
 * @copyright    Copyright (c) 2013 Gorkana (http://www.gorkana.com/)
 */
class CliCommand extends Command
{
    /**
     * Configure the "calculate" command
     *
     * @return void
     */
    protected function configure()
    {
        $calculate = new Calc\Calculate();
        $this
            ->setName("calculate")
            ->setDescription("Execute mathematical calculations read from specified file.")
            ->addArgument('file', InputArgument::REQUIRED, 'Location of the file containing the mathematical instructions.')
            ->setHelp(<<<EOT
The <info>calculate</info> command executes mathematical calculations read from specified file. Possible calculations: {$calculate->availableInstructions()}
EOT
            )
        ;
    }

    /**
     * Execute "calculate" command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('file');

        $execute = new Calc\Calculate($file);

        try {
            $result = $execute->run();
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }

        $output->writeln($result);
    }
}
