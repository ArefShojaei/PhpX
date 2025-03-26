<?php

namespace PhpX\Utils\Console\Contracts;


final class ConsoleColor {
    const ALIAS = "\x1b";
    const RESET = "0m";
    const SYMBOL = "[";

    const TEXT_RED = "31m";
    const TEXT_GREEN = "32m";
    const TEXT_YELLOW = "33m";
    const TEXT_BLUE = "34m";

    const BG_RED = "41m";
    const BG_GREEN = "42m";
    const BG_YELLOW = "43m";
    const BG_BLUE = "44m";
}