<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use PhpX\Utils\Console\Console;
use PhpX\Utils\Console\Contracts\ConsoleInterface;
use function Tests\isImplementsInterface;


final class ConsoleTest extends TestCase {
    private const LOG_LEVEL = "log";
    private const INFO_LEVEL = "info";
    private const SUCCESS_LEVEL = "success";
    private const WARN_LEVEL = "warn";
    private const ERROR_LEVEL = "error";
    private const CUSTOM_LABEL = "LABEL";


    private function printMessage(string $level, string $label = null): string {
        $message = "Custom message!";

        return Console::{$level}($message, label:$label);
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
    public function getMessageOfLogLevelTypeWithLabel() {
        $result = $this->printMessage(self::LOG_LEVEL, self::CUSTOM_LABEL);

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
    public function getMessageOfInfoLevelTypeWithLabel() {
        $result = $this->printMessage(self::INFO_LEVEL, self::CUSTOM_LABEL);

        $this->assertIsString($result);
    }

    /**
     * @test
     */
    public function getMessageOfSuccessLevelType() {
        $result = $this->printMessage(self::SUCCESS_LEVEL);

        $this->assertIsString($result);
    }

    /**
     * @test
     */
    public function getMessageOfSuccessLevelTypeWithLabel() {
        $result = $this->printMessage(self::SUCCESS_LEVEL, self::CUSTOM_LABEL);

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
    public function getMessageOfWarnLevelTypeWithLabel() {
        $result = $this->printMessage(self::WARN_LEVEL, self::CUSTOM_LABEL);

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
    public function getMessageOfErrorLevelTypeWithLabel() {
        $result = $this->printMessage(self::ERROR_LEVEL, self::CUSTOM_LABEL);

        $this->assertIsString($result);
    }

    /**
     * @test
     */
    public function checkToImplementConsoleInterface() {
        $result = isImplementsInterface(Console::class, ConsoleInterface::class);

        $this->assertIsBool($result);
        $this->assertTrue($result);
    }
}