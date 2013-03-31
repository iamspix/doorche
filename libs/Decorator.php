<?php

/**
 * Decorator - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class Decorator {

    protected $object;

    public function __construct($object) {
        $this->object = $object;
    }

    public function __call($method, $arguments) {
        if ($object = $this->isCallable($method)) {
            return call_user_func_array(array($object, $method), $arguments);
        }
        throw new Exception('Undefined method - ' . get_class($this->getOriginalObject()) . '::' . $method);
    }

    public function __get($property) {
        $object = $this->getOriginalObject();
        if (property_exists($object, $property)) {
            return $this->object->property;
        }

        return null;
    }

    public function __set($property, $value) {
        $object = $this->getOriginalObject();
        $object->$property = $value;

        return $this;
    }

    public function getOriginalObject() {
        $object = $this->object;
        while ($object instanceof Decorator) {
            $object = $object->getOriginalObject();
        }

        return $object;
    }

    public function isCallable($method, $checkSelf = false) {
        $object = $this->getOriginalObject();
        if (is_callable(array($object, $method))) {
            return $object;
        }

        $object = $checkSelf ? $this : $this->object;
        while ($object instanceof Decorator) {
            if (is_callable(array($object, $method))) {
                return $object;
            }
            $object = $this->object;
        }
        return false;
    }
}

/* End of file Decorator.php */