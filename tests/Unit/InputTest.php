<?php

namespace PhpX\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PhpX\Utils\Input\Contracts\InputInterface;
use PhpX\Utils\Input\Input;


final class InputTest extends TestCase {
    private ?array $args;
    
    protected function setUp(): void {
        $this->args = ["cli", "welcome"]; # [COMMAND] "php cli welcome"
    }
    
    protected function tearDown(): void {
        unset($this->args);
    }

    /**
     * @test
     */
    public function setArguments() {
        $args = $this->args;

        Input::set($args);

        $this->assertIsArray($args);
    }

    /**
     * @test
     */
    public function getArguments() {
        $command = Input::get();

        $this->assertIsString($command);
    }

    /**
     * @test
     */
    public function checkToImplementInputInterface() {
        $interfaces = class_implements(Input::class);

        $result = $interfaces[InputInterface::class] ? true : false;

        $this->assertIsBool($result);
    }
}