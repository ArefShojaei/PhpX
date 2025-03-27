<?php

namespace PhpX\Components\Console;

use PhpX\Components\Console\Contracts\CommandInterface;


abstract class Command implements CommandInterface {
    abstract public function exec(array $params = []): string; 
}