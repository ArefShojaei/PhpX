<?php

namespace PhpX\Components\Console;

use Closure;
use PhpX\Components\{
    Console\Contracts\AppInterface,
    Routing\Router
};
use PhpX\Utils\{
    Console\Console,
    Input\Input
};


final class App implements AppInterface {
    use Router;

    const COMMAND_PARAMS_COUNT = 1; 

    private $providers = [];
    

    public function __construct() {
        global $argv;

        Input::set($argv);
    }

    public function use(Closure|Provider $callback): void {
        $this->providers[] = $callback;
    }

    public function launch(): void {
        $input = Input::get();

        [$params, $action] = $this->findCommand($input);

        if (!$this->isMatchedCommand($params)) die(Console::error("The command is not valid!"));

        if (count($params) > self::COMMAND_PARAMS_COUNT) $this->addCommandParams($params);

        $this->applyProviders();

        $this->executeCommand($action);
    }
}