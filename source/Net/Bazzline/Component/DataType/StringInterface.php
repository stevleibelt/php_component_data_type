<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-07 
 */

namespace Net\Bazzline\Component\DataType;

/**
 * Class StringInterface
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-07
 */
interface StringInterface extends DataTypeInterface
{
    /**
     * @return int
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function length();

    /**
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function trim();

    /**
     * @param string|array $search
     * @param string|array $replace
     * @param bool $ignoreCase
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function replace($search, $replace, $ignoreCase = true);

    /**
     * @param string $search
     * @param bool $ignoreCase
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function contains($search, $ignoreCase = true);

    /**
     * @param string $prefix
     * @param bool $ignoreCase
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function startsWith($prefix, $ignoreCase = true);

    /**
     * @param string $suffix
     * @param bool $ignoreCase
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function endsWith($suffix, $ignoreCase = true);

    /**
     * @return string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function toLower();

    /**
     * @return string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function toUpper();

}