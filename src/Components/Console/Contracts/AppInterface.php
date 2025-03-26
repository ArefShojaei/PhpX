<?php

namespace PhpX\Components\Console\Contracts;

use Closure;


interface AppInterface {
    public function use(Closure $callback): void;

    public function launch(): void;
}