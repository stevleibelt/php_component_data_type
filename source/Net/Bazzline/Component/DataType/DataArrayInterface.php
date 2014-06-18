<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-07 
 */

namespace Net\Bazzline\Component\DataType;

use ArrayAccess;
use Countable;
use Iterator;

/**
 * Class DataArrayInterface
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-07
 */
interface DataArrayInterface extends ArrayAccess, Countable, Iterator, DataTypeInterface
{
    /**
     * @param DataArrayInterface $dataArray
     * @param bool $overwrite
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-31
     */
    public function merge(DataArrayInterface $dataArray, $overwrite = true);
}