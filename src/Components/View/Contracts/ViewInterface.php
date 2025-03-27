<?php

namespace PhpX\Components\View\Contracts;


interface ViewInterface {
    public function build(): string;
}