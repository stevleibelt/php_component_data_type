<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-07 
 */

namespace Net\Bazzline\Component\DataType;

/**
 * Class FloatingPointableInterface
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-07
 */
interface FloatingPointableInterface
{
    /**
     * @param float $floatingPoint
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-07
     */
    public function fromFloatingPoint($floatingPoint);

    /**
     * @return float
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-07
     */
    public function toFloatingPoint();
}