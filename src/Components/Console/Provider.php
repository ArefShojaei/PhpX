<?php

namespace PhpX\Components\Console;

use PhpX\Components\Console\Contracts\ProviderInterface;


abstract class Provider implements ProviderInterface {
    abstract public function handle(): void;
}