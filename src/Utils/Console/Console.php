<?php

namespace PhpX\Utils\Console;

use PhpX\Utils\Console\Contracts\ConsoleInterface;
use PhpX\Utils\Console\Contracts\ConsoleLabel as Label;



class Console implements ConsoleInterface {
    private static function print($level, string $message): string {
        return "[{$level}] {$message}";
    }

    public static function log(string $message): string {
        return self::print(Label::LOG, $message);
    }

    public static function info(string $message): string {
        return self::print(Label::INFO, $message);
    }

    public static function warn(string $message): string {
        return self::print(Label::WARN, $message);
    }

    public static function error(string $message): string {
        return self::print(Label::ERROR, $message);
    }
}