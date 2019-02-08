<?php


namespace components\RenderBlocks;


use components\RenderBlockInterface;

class ImageBlock extends RenderBlock implements RenderBlockInterface
{

    public function getCodeForPage($childCode)
    {
        $settings = $this->getSettingsData();
        return '<div class="image-block ' . $settings['zoom'] . '" >' . $this->getPayloadData() . '</div>';
    }

    public function getChilds()
    {
        return $this->children;
    }

    public function getPayloadData()
    {
        $data = '';
        if (!empty($this->payload->image) && !empty($this->payload->image->url)) {
            $data .= (!empty($this->payload->link) ? '<a href="' . $this->payload->link . '">' : '');
            $data .= '<img src="' . $this->payload->image->url . '"/>';
            $data .= (!empty($this->payload->link) ? '</a>' : '');
        }
        return $data;
    }

    public function getSettingsData()
    {
        return [
            'zoom' => $this->settings->zoom ? 'zoom-true' : 'zoom-false',
        ];
    }
}
