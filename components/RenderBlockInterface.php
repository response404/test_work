<?php


namespace components;


interface RenderBlockInterface
{
    public function getCodeForPage($childCode);
    public function getChilds();
    public function getPayloadData();
    public function getSettingsData();
}