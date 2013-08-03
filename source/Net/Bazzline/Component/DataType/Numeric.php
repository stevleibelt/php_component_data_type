<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03 
 */

namespace Net\Bazzline\Component\DataType;

/**
 * Class Numeric
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03
 */
class Numeric extends DataTypeAbstract
{
    /**
     * @param mixed $plus
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function add($plus)
    {
        $this->value += $this->castToType($plus);

        return $this;
    }

    /**
     * @param mixed $minus
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function subtract($minus)
    {
        $this->value -= $this->castToType($minus);

        return $this;
    }

    /**
     * @param mixed $times
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function multiply($times)
    {
        $this->value *= $this->castToType($times);

        return $this;
    }

    /**
     * @param $divisor
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function divide($divisor)
    {
        $this->value /= $this->castToType($divisor);

        return $this;
    }

    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function isPositive()
    {
        return ($this->value > 0);
    }

    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function isNegative()
    {
        return ($this->value < 0);
    }

    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function isZero()
    {
        return ($this->value == 0);
    }

    /**
     * @param $number
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function isEqual($number)
    {
        return ($this->value == $this->castToType($number));
    }

    /**
     * @param $number
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function isGreater($number)
    {
        return ($this->value > $this->castToType($number));
    }

    /**
     * @param $number
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function isGreaterOrEqual($number)
    {
        return ($this->isGreater($number) || $this->isEqual($number));
    }

    /**
     * @param $number
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function isLess($number)
    {
        return ($this->value < $this->castToType($number));
    }

    /**
     * @param $number
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function isLessOrEqual($number)
    {
        return ($this->isLess($number) || $this->isEqual($number));
    }

    /**
     * @param mixed $value
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    protected function castToType($value)
    {
        return (!is_numeric($value)) ? $value : preg_replace( '/[^0-9]\./', '', $value );
    }
}