<?php


namespace components\RenderBlocks;


use components\RenderBlockInterface;

class ButtonBlock extends RenderBlock implements RenderBlockInterface
{

    public function getCodeForPage($childCode)
    {
        return $this->getPayloadData();
    }

    public function getChilds()
    {
        return $this->children;
    }

    public function getPayloadData()
    {
        $settings = $this->getSettingsData();

        if (!empty($this->payload) && !empty($this->payload->link)) {
            return '<a class="a-button" href="' . ($this->payload->link->payload ?: '')
                . '" target="_blank"><div class="button-block ' . $settings['size'] . '" style="color: '
                . $settings['textColor'] . '; background-color: ' . $settings['background'] . ';">'
                . ($this->payload->text ?: '') . '</div></a>';
        }

        return '';
    }

    public function getSettingsData()
    {
        return [
            'size' => $this->settings->size ?: 'medium',
            'textColor' => $this->settings->textColor ?: '#FFFFFF',
            'background' => $this->settings->backgroundColor ?: '#FF0000',
        ];
    }
}
