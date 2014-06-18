<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-07 
 */

namespace Net\Bazzline\Component\DataType;

use Net\Bazzline\Component\Lock\LockInterface;

/**
 * Class DataTypeInterface
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-07
 */
interface DataTypeInterface extends LockInterface, ArrayableInterface, BooleanableInterface, FloatingPointableInterface, IntegerableInterface, NumericableInterface, StringableInterface
{
    /**
     * @param null|string|int|float $value
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-07
     */
    public function __construct($value = null);

    /**
     * @param $value
     * @return $this
     * @throws RuntimeException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-07
     */
    public function setValue($value);

    /**
     * @return mixed
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-07
     */
    public function getValue();

    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-07
     */
    public function isEmpty();

    /**
     * @return string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-07
     */
    public function __toString();
}