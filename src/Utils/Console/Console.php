<?php

namespace PhpX\Utils\Console;

use PhpX\Utils\Console\Contracts\{
    ConsoleInterface,
    ConsoleLabel as Label,
    ConsoleColor as Color
};


final class Console implements ConsoleInterface {
    private static function make(string $color, string $content): string {
        return Color::ALIAS . Color::SYMBOL . $color . $content . Color::ALIAS . Color::SYMBOL . Color::RESET;
    }

    private static function print(string $level, string $message): string {
        return "{$level} {$message}";
    }

    public static function log(string $message, string $label = null): string {
        $level = "[" . ($label ? $label : Label::LOG) . "]";
        
        return self::print($level, $message);
    }

    public static function info(string $message, string $label = null): string {
        $level = self::make(Color::BG_BLUE, "[" . ($label ? $label : Label::INFO) . "]");
        $message = self::make(Color::TEXT_BLUE, $message);

        return self::print($level, $message);
    }

    public static function success(string $message, string $label = null): string {
        $level = self::make(Color::BG_GREEN, "[" . ($label ? $label : Label::SUCCESS) . "]");
        $message = self::make(Color::TEXT_GREEN, $message);

        return self::print($level, $message);
    }

    public static function warn(string $message, string $label = null): string {
        $level = self::make(Color::BG_YELLOW, "[" . ($label ? $label : Label::WARN) . "]");
        $message = self::make(Color::TEXT_YELLOW, $message);

        return self::print($level, $message);
    }

    public static function error(string $message, string $label = null): string {
        $level = self::make(Color::BG_RED, "[" . ($label ? $label : Label::ERROR) . "]");
        $message = self::make(Color::TEXT_RED, $message);

        return self::print($level, $message);
    }
}