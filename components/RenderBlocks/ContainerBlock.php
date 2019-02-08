<?php


namespace components\RenderBlocks;


use components\RenderBlockInterface;

class ContainerBlock extends RenderBlock implements RenderBlockInterface
{

    public function getCodeForPage($childCode)
    {
        return '<div class="container">' . $childCode . '</div>';
    }

    public function getChilds()
    {
        return $this->children;
    }

    public function getPayloadData()
    {
        return null;
    }

    public function getSettingsData()
    {
        return null;
    }
}
