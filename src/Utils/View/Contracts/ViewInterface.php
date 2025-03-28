<?php

namespace PhpX\Utils\View\Contracts;


interface ViewInterface {
    public function build(): string;
}