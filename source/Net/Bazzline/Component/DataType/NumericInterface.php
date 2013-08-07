<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-07 
 */

namespace Net\Bazzline\Component\DataType;

/**
 * Class NumericInterface
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-07
 */
interface NumericInterface extends DataTypeInterface
{
    /**
     * @param mixed $plus
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function add($plus = 1);

    /**
     * @param mixed $minus
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function subtract($minus = 1);

    /**
     * @param mixed $times
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function multiply($times = 1);

    /**
     * @param $divisor
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function divide($divisor = 1);

    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function isPositive();

    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function isNegative();

    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function isZero();

    /**
     * @param $number
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function isEqual($number);

    /**
     * @param $number
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function isGreater($number);

    /**
     * @param $number
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function isGreaterOrEqual($number);

    /**
     * @param $number
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function isLess($number);

    /**
     * @param $number
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function isLessOrEqual($number);
}