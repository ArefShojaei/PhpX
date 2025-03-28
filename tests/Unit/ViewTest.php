<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use PhpX\Components\View\Contracts\ViewBuilderInterface;
use PhpX\Components\View\ViewBuilder;
use function Tests\isImplementsInterface;


final class ViewTest extends TestCase {
    private ?ViewBuilder $builder;


    protected function setUp(): void {
        $this->builder = new ViewBuilder;
    }

    protected function tearDow(): void {
        unset($this->builder);
    }

    /**
     * @test
     */
    public function addHeaderTable(): ViewBuilder {
        $builderInstance = $this->builder->addHeader();

        $this->assertIsObject($builderInstance);
        
        return $builderInstance;
    }

    /**
     * @test
     * @depends addHeaderTable
     */
    public function addCellTable(ViewBuilder $builder): ViewBuilder {
        $builderInstance = $builder->addCell(title:"Cell");

        $this->assertIsObject($builderInstance);
        
        return $builderInstance;
    }

    /**
     * @test
     * @depends addCellTable
     */
    public function addFooterTable(ViewBuilder $builder): ViewBuilder {
        $builderInstance = $builder->addFooter();

        $this->assertIsObject($builderInstance);
        
        return $builderInstance;
    }

    /**
     * @test
     * @depends addFooterTable
     */
    public function buildViewContent(ViewBuilder $builder) {
        $content = $builder->build();

        $this->assertIsString($content);
    }

    /**
     * @test
     */
    public function checkToImplementsViewBuilderInterface() {
        $result = isImplementsInterface(ViewBuilder::class, ViewBuilderInterface::class);

        $this->assertIsBool($result);
        $this->assertTrue($result);
    }
}