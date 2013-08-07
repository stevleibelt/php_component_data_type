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
     * @param int $integer
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-07
     */
    public function fromInteger($integer);

    /**
     * @return int
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-07
     */
    public function toInteger();
}