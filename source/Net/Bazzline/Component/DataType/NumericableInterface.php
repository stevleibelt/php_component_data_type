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
     * @param numeric $numeric
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-07
     */
    public function fromNumeric($numeric);

    /**
     * @return numeric
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-07
     */
    public function toNumeric();
}