<?php

namespace PhpX\Utils\Input;

use PhpX\Utils\Input\Contracts\Interfaces\InputInterface;


final class Input implements InputInterface {
    /**
     * input arguments without "php [filename].php" command as prefix
     */
    private static array $args = [];


    public static function set(array $args): void {
        if (self::isEmpty()) die("Arguments already defined!");
        
        array_shift($args);

        self::$args = [...$args];
    }
    
    public static function get(): string {
        return implode(" ", self::$args);
    }

    private static function isEmpty(): bool {
        return count(self::$args) ? true : false;
    }
}