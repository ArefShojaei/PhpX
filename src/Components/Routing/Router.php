<?php

namespace PhpX\Components\Routing;

use Closure;
use PhpX\Utils\Console\Console;


trait Router {
    use Route;

    private string $commandPrefix = "";

    protected array $commands = [];


    private function addCommand(string $command, Closure $callback): void {
        $this->commands[trim($this->commandPrefix . $command)] = $callback;
    }

    protected function findCommand(string $command): callable {
        return $this->commands[$command] ?? die(Console::error("The command is not defined!"));
    }
    
    protected function executeCommand(callable $commandHandler): void {
        echo $commandHandler();
    }
}