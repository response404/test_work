<?php


namespace components\RenderBlocks;


use components\RenderBlockInterface;

class TextBlock extends RenderBlock implements RenderBlockInterface
{

    public function getCodeForPage($childCode)
    {
        $settings = $this->getSettingsData();
        return '<div class="text-block ' . $settings['fsize'] . '" style="text-align: '
            . $settings['align'] . ';">' . $this->getPayloadData() . '</div>';
    }

    public function getChilds()
    {
        return $this->children;
    }

    public function getPayloadData()
    {
        return !empty($this->payload->text) ? '<p>' . $this->payload->text . '</p>' : '';
    }

    public function getSettingsData()
    {
        return [
            'fsize' => $this->settings->fontSize ?: 'medium',
            'align' => $this->settings->textAlign ?: 'center',
        ];
    }
}
