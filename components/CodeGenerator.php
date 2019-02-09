<?php

namespace components;

use components\Blocks\BlocksFactory;

class CodeGenerator
{
    public function processOutput($data)
    {
        if (empty($data->type)) {
            throw new \Exception('Wrong data format!');
        }

        $object = BlocksFactory::makeBlock($data);
        return $object->render();
    }
}
