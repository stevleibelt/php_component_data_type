<?php

abstract class DataTypeAbstract
{
    protected $value;

    public function set($value)
    {
        //validator?
        $this->value = $value;

        return $this;
    }

    public function get()
    {
        return $this->value;
    }

    abstract public function __toString();

    abstract protected function castToType($value);
}
