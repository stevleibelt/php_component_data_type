<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-07 
 */

namespace Net\Bazzline\Component\DataType;

use ArrayAccess;
use Countable;
use Iterator;

/**
 * Class ArrayableInterface
 *
 * @package Net\Bazzline\Component\Utility
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-07
 */
interface ArrayableInterface extends ArrayAccess, Countable, Iterator
{
    /**
     * @param array $array
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-07
     */
    public function fromArray(array $array);

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-07
     */
    public function toArray();
}