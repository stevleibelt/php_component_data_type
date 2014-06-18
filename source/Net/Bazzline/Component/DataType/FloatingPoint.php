<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-03 
 */

namespace Net\Bazzline\Component\DataType;

/**
 * Class FloatingPoint
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-03
 */
class FloatingPoint extends Numeric implements FloatingPointableInterface
{
    /**
     * @return float|mixed
     * {@inheritdoc}
     */
    protected function castToType($value)
    {
        return (float) $value;
    }
}