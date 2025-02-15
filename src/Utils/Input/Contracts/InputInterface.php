<?php

namespace PhpX\Utils\Input\Contracts;


interface InputInterface {
    public static function set(array $args): void;
    
    public static function get(): string;
}