<?php

namespace PhpX\Utils\View\Contracts;


interface ViewBuilderInterface {
    public function addHeader(int $length = 20, $symbol = "-", $align = STR_PAD_BOTH): self;
    public function addCell(string $title, int $length = 20, $align = STR_PAD_BOTH, $isLast = false): self;
    public function addSeparator(string $symbol = "*", int $length = 20, $align = STR_PAD_BOTH): self;
    public function addFooter(int $length = 20, $symbol = "-", $align = STR_PAD_BOTH): self;
    public function build(): string;
}