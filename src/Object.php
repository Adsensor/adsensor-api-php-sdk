<?php

namespace Adsensor\API;

/**
 * Object
 *
 * @property array $params
 */
class Object {

    protected $params = [];

    public function __set($name, $value)
    {
        $this->params[$name] = $value;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->params)) {
            return $this->params[$name];
        }
        return null;
    }

}