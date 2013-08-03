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
    public function addition($plus)
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
    public function subtraction($minus)
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
    public function multiplication($times)
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
    public function division($divisor)
    {
        $this->value /= $this->castToType($divisor);

        return $this;
    }

    /**
     * @param mixed $value
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    protected function castToType($value)
    {
        return (is_numeric($value)) ? $value : preg_replace( '/[^0-9]\./', '', $value );
    }
}