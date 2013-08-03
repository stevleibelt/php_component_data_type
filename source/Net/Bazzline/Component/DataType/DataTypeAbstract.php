<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03
 */

namespace Net\Bazzline\Component\DataType;

/**
 * Class DataTypeAbstract
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03
 */
abstract class DataTypeAbstract
{
    /**
     * @var mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    protected $value;

    /**
     * @param null|string|int|float $value
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function __construct($value = null)
    {
        if (is_resource($value)
            || is_object($value)) {
            throw new InvalidArgumentException(
                'Resource of object given'
            );
        }
        $this->setValue($value);
    }

    /**
     * @param $value
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function setValue($value)
    {
        $this->value = $this->castToType($value);

        return $this;
    }

    /**
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return Boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function toBoolean()
    {
        return new Boolean($this->value);
    }

    /**
     * @return String
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function toString()
    {
        return new String($this->value);
    }

    /**
     * @return Numeric
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function toNumeric()
    {
        return new Numeric($this->value);
    }

    /**
     * @return FloatingPoint
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function toFloatingPoint()
    {
        return new FloatingPoint($this->value);
    }

    /**
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function __toString()
    {
        return (string) $this->castToType($this->value);
    }

    /**
     * @param mixed $value
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    abstract protected function castToType($value);
}
