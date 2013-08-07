<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-07 
 */

namespace Net\Bazzline\Component\DataType;

/**
 * Class StringableInterface
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-07
 */
interface StringableInterface
{
    /**
     * @param string|String $string
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-07
     */
    public function fromString($string);

    /**
     * @return String
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-07
     */
    public function toString();
}