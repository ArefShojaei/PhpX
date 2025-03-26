<?php

namespace PhpX\Components\Console;

use Closure;
use PhpX\Components\{
    Console\Contracts\AppInterface,
    Routing\Router
};
use PhpX\Utils\Input\Input;


final class App implements AppInterface {
    use Router;

    private $providers = [];
    

    public function __construct() {
        global $argv;

        Input::set($argv);
    }

    public function use(Closure $callback): void {
        $this->providers[] = $callback;
    }

    public function launch(): void {
        $input = Input::get();

        $commandHandler = $this->findCommand($input);

        $this->executeCommand($commandHandler);
    }
}