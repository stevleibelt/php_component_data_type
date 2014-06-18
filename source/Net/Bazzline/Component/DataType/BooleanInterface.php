<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-07 
 */

namespace Net\Bazzline\Component\DataType;

/**
 * Class BooleanInterface
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-07
 */
interface BooleanInterface extends DataTypeInterface
{
    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function isTrue();

    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function isFalse();

    /**
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function setFalse();

    /**
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function setTrue();
}