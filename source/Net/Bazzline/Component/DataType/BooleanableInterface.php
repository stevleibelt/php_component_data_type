<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-07 
 */

namespace Net\Bazzline\Component\DataType;

/**
 * Class BooleanableInterface
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-07
 */
interface BooleanableInterface
{
    /**
     * @param boolean|Boolean $boolean
     * @return $this
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-07
     */
    public function fromBoolean($boolean);

    /**
     * @return Boolean
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-07
     */
    public function toBoolean();
}