<?php

namespace Gorkana\Calculator;

use Gorkana\Console\Command as ConsoleCmd;
use Symfony\Component\Console\Application;

/**
 * Calculator Application class
 *
 * @package      Gorkana\Calculator
 * @author       Balazs Csaba <csaba.balazs@evozon.com>
 * @copyright    Copyright (c) 2013 Gorkana (http://www.gorkana.com/)
 */
class App
{
    /**
     * @const string
     */
    const APP_NAME = "Gorkana Calculator";
    /**
     * @const string
     */
    const APP_VERSION = "0.1.0";

    /**
     * Run the application with context awareness
     *
     * @return void
     */
    public function run()
    {
        if ($this->isCLI()) {
            $this->runCLI();
        } else {
            $this->runWeb();
        }
    }

    /**
     * Run CLI context
     *
     * @return void
     */
    protected function runCLI()
    {
        $app = new Application(self::APP_NAME, self::APP_VERSION);
        $app->addCommands(array(
            new ConsoleCmd\CliCommand(),
        ));
        $app->run();
    }

    /**
     * Run Web context
     *
     * @return void
     */
    protected function runWeb()
    {
        die("Calculator is only available using the command line interface. Please check the README file for usage instructions.");
    }

    /**
     * Check if context is CLI or not
     *
     * @return bool
     */
    protected function isCLI()
    {
        return (php_sapi_name() == "cli");
    }
}
