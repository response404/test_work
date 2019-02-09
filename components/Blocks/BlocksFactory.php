<?php

namespace components\Blocks;

class BlocksFactory
{
    public static function makeBlock($object)
    {
        $className = 'components\\Blocks\\' . ucfirst($object->type);
        return new $className($object);
    }
}