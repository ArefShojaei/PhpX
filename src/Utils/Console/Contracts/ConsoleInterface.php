<?php

namespace PhpX\Utils\Console\Contracts;


interface ConsoleInterface {
    public static function log(string $message, string $label = null): string;
    public static function info(string $message, string $label = null): string;
    public static function warn(string $message, string $label = null): string;
    public static function error(string $message, string $label = null): string;
}