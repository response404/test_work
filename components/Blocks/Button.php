<?php

namespace components\Blocks;

class Button extends AbstractBlock
{
    protected $styles = [
        'textColor' => 'color',
        'backgroundColor' => 'background-color',
    ];

    protected $classes = ['size', 'style'];
}
