<?php

namespace PhpX\Components\Console\Contracts;


interface CommandInterface {
    public function exec(array $params): string;
}