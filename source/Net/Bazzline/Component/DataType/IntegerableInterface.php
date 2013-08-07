<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-07 
 */

namespace Net\Bazzline\Component\DataType;

/**
 * Class IntegerableInterface
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-07
 */
interface IntegerableInterface
{
    /**
     * @param int|Integer $integer
     * @return $this
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-07
     */
    public function fromInteger($integer);

    /**
     * @return Integer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-07
     */
    public function toInteger();
}