<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-03
 */

namespace Net\Bazzline\Component\DataType;

use Net\Bazzline\Component\Lock\RuntimeLock;

/**
 * Class DataTypeAbstract
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-03
 */
abstract class DataTypeAbstract implements DataTypeInterface
{
    /**
     * @var bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-04
     */
    protected $isEmpty;

    /**
     * @var \Net\Bazzline\Component\Lock\RuntimeLock
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-05
     */
    protected $lock;

    /**
     * @var mixed
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    protected $value;

    /**
     * @param null|string|int|float $value
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function __construct($value = null)
    {
        $this->lock = new RuntimeLock();
        $this->validateAndSetValue($value);
    }

    /**
     * @param $value
     * @return $this
     * @throws RuntimeException
     * @author stev leibelt <artodeto@bazzline.net>
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
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-04
     */
    public function isEmpty()
    {
        return $this->isEmpty;
    }

    /**
     * @param bool|Boolean $boolean
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-07
     */
    public function fromBoolean($boolean)
    {
        $this->validateAndSetValue($boolean);

        return $this;
    }

    /**
     * @return Boolean
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function toBoolean()
    {
        return new Boolean($this->value);
    }

    /**
     * @return String
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function toString()
    {
        return new String($this->value);
    }

    /**
     * @param array|DataArray $array
     * @return $this
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-07
     */
    public function fromArray(array $array)
    {
        $this->validateAndSetValue($array);

        return $this;
    }

    /**
     * @return DataArray
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-07
     */
    public function toArray()
    {
        return new DataArray($this->value);
    }

    /**
     * @param float|FloatingPoint $floatingPoint
     * @return $this
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-07
     */
    public function fromFloatingPoint($floatingPoint)
    {
        $this->validateAndSetValue($floatingPoint);

        return $this;
    }

    /**
     * @param int|Integer $integer
     * @return $this
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-07
     */
    public function fromInteger($integer)
    {
        $this->validateAndSetValue($integer);

        return $this;
    }

    /**
     * @param numeric|Numeric $numeric
     * @return $this
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-07
     */
    public function fromNumeric($numeric)
    {
        $this->validateAndSetValue($numeric);

        return $this;
    }

    /**
     * @param string|String $string
     * @return $this
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-07
     */
    public function fromString($string)
    {
        $this->validateAndSetValue($string);

        return $this;
    }

    /**
     * @return Numeric
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function toNumeric()
    {
        return new Numeric($this->value);
    }

    /**
     * @return FloatingPoint
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function toFloatingPoint()
    {
        return new FloatingPoint($this->value);
    }

    /**
     * @return Integer
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function toInteger()
    {
        return new Integer($this->value);
    }

    /**
     * @return string
     * @author stev leibelt <artodeto@bazzline.net>
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
     * @author stev leibelt <artodeto@bazzline.net>
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
     * @author stev leibelt <artodeto@bazzline.net>
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
     * @author stev leibelt <artodeto@bazzline.net>
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
     * @author stev leibelt <artodeto@bazzline.net>
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
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-01-03
     */
    public function setName($name)
    {
        $this->lock->setName($name);
    }

    /**
     * @param boolean|numeric|integer|float|bool|string|DataTypeInterface $value
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-07
     */
    protected function validateAndSetValue($value)
    {
        if (!is_object($value)
            && !is_resource($value)) {
            $this->setValue($value);
        } else {
            if (is_object($value)
                && ($value instanceof DataTypeInterface)) {
                $this->setValue($value->getValue());
            } else {
                throw new InvalidArgumentException(
                    'resource or object given'
                );
            }
        }
    }

    /**
     * @param mixed $value
     * @return mixed
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    abstract protected function castToType($value);
}
