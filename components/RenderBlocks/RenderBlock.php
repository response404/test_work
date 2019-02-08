<?php


namespace components\RenderBlocks;


use components\RenderBlockInterface;

abstract class RenderBlock implements RenderBlockInterface
{
    protected $payload;
    protected $children;
    protected $settings;

    public function __construct($object)
    {
        $this->payload = !empty($object->payload) ? $object->payload : null;
        $this->children = !empty($object->children) ? $object->children : null;
        $this->settings = !empty($object->settings) ? $object->settings : null;
    }
}
