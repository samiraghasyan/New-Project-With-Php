<?php

namespace core\Database\Traits;
trait HasAttributes
{
    protected function setAttributes(array $array, $object = null)
    {
        if (!$object) {
            $class = get_called_class();
            $object = new $class;
        }

        foreach ($array as $attribute => $value) {
            $object->$attribute = $value;
        }

        return $object;
    }
}