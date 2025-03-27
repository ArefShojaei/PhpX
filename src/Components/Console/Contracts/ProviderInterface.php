<?php

namespace PhpX\Components\Console\Contracts;


interface ProviderInterface {
    public function handle(): void;
}