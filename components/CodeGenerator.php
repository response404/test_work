<?php


namespace components;


class CodeGenerator
{

    public function processOutput($data)
    {
        if (empty($data->type)) {
            throw new \Exception('Wrong data format!');
        }

        $object = $this->factory($data);
        $code = $this->parseObjects($object);

        return $code;
    }

    private function parseObjects(RenderBlockInterface $object)
    {
        $code = '';
        if ($childs = $object->getChilds()) {
            foreach ($childs as $child) {
                $code .= $this->parseObjects($this->factory($child));
            }
        }
        return $object->getCodeForPage($code);
    }

    private function factory($object)
    {
        switch ($object->type) {
            case 'image':
                $class = 'components\RenderBlocks\ImageBlock';
                break;

            case 'text':
                $class = 'components\RenderBlocks\TextBlock';
                break;

            case 'block':
                $class = 'components\RenderBlocks\SimpleBlock';
                break;

            case 'button':
                $class = 'components\RenderBlocks\ButtonBlock';
                break;

            case 'container':
            default:
                $class = 'components\RenderBlocks\ContainerBlock';
                break;
        }
        return new $class($object);
    }
}
