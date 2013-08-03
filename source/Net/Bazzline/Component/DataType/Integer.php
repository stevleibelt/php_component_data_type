<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03 
 */

namespace Net\Bazzline\Component\DataType;

/**
 * Class Integer
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03
 */
class Integer extends Numeric
{
    public function isOdd()
    {

    }

    public function isEven()
    {

    }

    /**
     * @return int
     * {@inheritdoc}
     */
    protected function castToType($value)
    {
        return (int) $value;
    }
}