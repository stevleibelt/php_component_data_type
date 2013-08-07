<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03
 */

namespace Net\Bazzline\Component\DataType;

use Net\Bazzline\Component\Lock\RuntimeLock;

/**
 * Class DataTypeAbstract
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03
 */
abstract class DataTypeAbstract implements DataTypeInterface
{
    /**
     * @var bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    protected $isEmpty;

    /**
     * @var \Net\Bazzline\Component\Lock\RuntimeLock
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-05
     */
    protected $lock;

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
                'resource or object given'
            );
        }
        $this->setValue($value);
        $this->lock = new RuntimeLock();
    }

    /**
     * @param $value
     * @return $this
     * @throws RuntimeException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function setValue($value)
    {
        if ($this->lock->isLocked()) {
            throw new RuntimeException(

            );
        }
        if ($value !== null) {
            $this->value = $this->castToType($value);
            $this->isEmpty = false;
        } else {
            $this->isEmpty = true;
        }

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
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public function isEmpty()
    {
        return $this->isEmpty;
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
     * @return Integer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function toInteger()
    {
        return new Integer($this->value);
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
     * Validates if lock is acquired
     *
     * @return boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-01-03
     */
    public function isLocked()
    {
        return $this->lock->isLocked();
    }

    /**
     * Acquires lock
     *
     * @throws \RuntimeException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-01-03
     */
    public function acquire()
    {
        $this->lock->acquire();
    }

    /**
     * Release lock
     *
     * @throws \RuntimeException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-01-03
     */
    public function release()
    {
        $this->lock->release();
    }

    /**
     * Returns name or default
     *
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-01-03
     */
    public function getName()
    {
        return $this->lock->getName();
    }

    /**
     * Sets name
     *
     * @param string $name - name of the lock
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-01-03
     */
    public function setName($name)
    {
        $this->lock->setName($name);
    }

    /**
     * @param mixed $value
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    abstract protected function castToType($value);
}
