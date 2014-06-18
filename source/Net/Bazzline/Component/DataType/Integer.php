<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-03 
 */

namespace Net\Bazzline\Component\DataType;

/**
 * Class Integer
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-03
 */
class Integer extends Numeric implements IntegerInterface
{
    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function isOdd()
    {
        return !$this->isEven();
    }

    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function isEven()
    {
        return (($this->value % 2) == 0);
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