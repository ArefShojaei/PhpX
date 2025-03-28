<?php

namespace PhpX\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PhpX\Utils\Console\Console;
use PhpX\Utils\Console\Contracts\ConsoleInterface;


final class ConsoleTest extends TestCase {
    private const LOG_LEVEL = "log";
    private const INFO_LEVEL = "info";
    private const WARN_LEVEL = "warn";
    private const ERROR_LEVEL = "error";


    private function printMessage(string $level): string {
        $message = "Custom message!";

        return Console::{$level}($message);
    }

    /**
     * @test
     */
    public function getMessageOfLogLevelType() {
        $result = $this->printMessage(self::LOG_LEVEL);

        $this->assertIsString($result);
    }

    /**
     * @test
     */
    public function getMessageOfInfoLevelType() {
        $result = $this->printMessage(self::INFO_LEVEL);

        $this->assertIsString($result);
    }

    /**
     * @test
     */
    public function getMessageOfWarnLevelType() {
        $result = $this->printMessage(self::WARN_LEVEL);

        $this->assertIsString($result);
    }

    /**
     * @test
     */
    public function getMessageOfErrorLevelType() {
        $result = $this->printMessage(self::ERROR_LEVEL);

        $this->assertIsString($result);
    }

    /**
     * @test
     */
    public function checkToImplementConsoleInterface() {
        $interfaces = class_implements(Console::class);

        $result = $interfaces[ConsoleInterface::class] ? true : false;

        $this->assertIsBool($result);
    }
}