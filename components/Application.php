<?php

namespace components;

class Application
{
    private $fileForParsing = '';

    public $fileRenderer;

    public function __construct()
    {
        $this->fileForParsing = DIR . '/data.json';
        $this->fileRenderer = new BasicRenderer();
    }

    public function run()
    {
        $this->fileRenderer->render($this->fileForParsing);
    }
}
