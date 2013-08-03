<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03 
 */

namespace Net\Bazzline\Component\DataType;

/**
 * Class FloatingPoint
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03
 */
class FloatingPoint extends Numeric
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