<?php

namespace PhpX\Components\Routing;

use Closure;


trait Route {
    public function command(string $command, Closure $callback): void {
        $this->addCommand($command, $callback);
    }

    public function group(string $prefix, Closure $callback): void {
        $this->commandPrefix = $prefix;
        
        $callback($this);

        $this->commandPrefix = "";
    }
}