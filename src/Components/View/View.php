<?php

namespace PhpX\Components\View;

use PhpX\Components\View\Contracts\ViewInterface;


class View implements ViewInterface {
    private ViewBuilder $builder;

    public function __construct(ViewBuilder $builder) {
        $this->builder = $builder;
    }

    public function build(): string {
       
        return $this->builder->content;
    }
}