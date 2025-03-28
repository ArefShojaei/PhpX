<?php

namespace PhpX\Utils\View;

use PhpX\Utils\View\Contracts\ViewInterface;


final class View implements ViewInterface {
    private ViewBuilder $builder;

    public function __construct(ViewBuilder $builder) {
        $this->builder = $builder;
    }

    public function build(): string {
       
        return $this->builder->content;
    }
}