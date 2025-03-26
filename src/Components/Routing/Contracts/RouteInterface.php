<?php

namespace PhpX\Components\Routing\Contracts;

use Closure;


interface RouteInterface {
    public function command(string $command, Closure $callback): void;
    public function group(string $prefix, Closure $callback): void;
}