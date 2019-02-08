<?php


namespace components\RenderBlocks;


use components\RenderBlockInterface;

class SimpleBlock extends RenderBlock implements RenderBlockInterface
{

    public function getCodeForPage($childCode)
    {
        $settings = $this->getSettingsData();
        return '<div class="block" style="text-align: ' . $settings['align'] . '">' . $childCode . '</div>';
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
        return [
            'align' => $this->settings->textAlign ?: 'center',
        ];
    }
}
