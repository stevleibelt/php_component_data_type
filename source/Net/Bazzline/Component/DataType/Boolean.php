<?php

class Boolean extends DataTypeAbstract
{
    private $value;

    public function __toString()
    {
        return (is_null($this->value)) ? null : (($this->value === true) ? true : false);
    }

    public function isTrue()
    {
        return ($this->value === true);
    }

    public function isFalse()
    {
        return ($this->value === false);
    }

    public function setFalse()
    {
        $this->value = false;

        retrun $this;
    }

    public function setTrue()
    {
        $this->value = true;

        retrun $this;
    }
}
