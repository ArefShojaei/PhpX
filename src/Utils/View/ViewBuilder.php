<?php

namespace PhpX\Utils\View;

use PhpX\Utils\View\Contracts\ViewBuilderInterface;


final class ViewBuilder implements ViewBuilderInterface {
    private const CONVERABLE_TABLE_LENGTH = 1;
    
    private const EMPTY_CONTENT = "";
    
    private const SPACE_CONTENT = " ";

    public string $content = self::EMPTY_CONTENT;

    public function addHeader(int $length = 20, $symbol = "-", $align = STR_PAD_BOTH): self {
        $this->content .= "+" . str_pad(self::EMPTY_CONTENT, $length + self::CONVERABLE_TABLE_LENGTH, $symbol, $align) . "+" . PHP_EOL;

        return $this; 
    }
    
    public function addCell(string $title, int $length = 20, $align = STR_PAD_BOTH, $isLast = false): self {
        $this->content .= "|" . str_pad($title, $length, self::SPACE_CONTENT, $align) . ($isLast ? "|" : self::EMPTY_CONTENT);
    
        return $this;
    }

    public function addSeparator(string $symbol = "*", int $length = 20, $align = STR_PAD_BOTH): self {
        $this->content .= PHP_EOL . "+" . str_pad(self::EMPTY_CONTENT, $length + self::CONVERABLE_TABLE_LENGTH, $symbol, $align) . "+" . PHP_EOL;
        
        return $this;
    }
    
    public function addFooter(int $length = 20, $symbol = "-", $align = STR_PAD_BOTH): self {
        $this->content .= PHP_EOL . "+" . str_pad(self::EMPTY_CONTENT, $length + self::CONVERABLE_TABLE_LENGTH, $symbol, $align) . "+" . PHP_EOL;

        return $this; 
    }

    public function build(): string {
        return (new View($this))->build();
    }
}