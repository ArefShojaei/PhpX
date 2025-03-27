<?php

namespace PhpX\Components\Routing;

use Closure;
use PhpX\Components\Console\Command;


trait Route {
    public function command(string $command, Closure|Command $callback): void {
        $this->addCommand($command, $callback);
    }

    public function group(string $prefix, Closure $callback): void {
        $this->commandPrefix = $prefix;
        
        $callback($this);

        $this->commandPrefix = "";
        $this->commandParams = [];
    }
}