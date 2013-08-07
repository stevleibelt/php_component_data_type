<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-07 
 */

namespace Net\Bazzline\Component\DataType;

/**
 * Class NumericableInterface
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-07
 */
interface NumericableInterface
{
    /**
     * @param numeric|Numeric $numeric
     * @return $this
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-07
     */
    public function fromNumeric($numeric);

    /**
     * @return Numeric
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-07
     */
    public function toNumeric();
}