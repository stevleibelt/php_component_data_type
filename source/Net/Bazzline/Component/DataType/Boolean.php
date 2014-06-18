<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-03
 */

namespace Net\Bazzline\Component\DataType;

/**
 * Class Boolean
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-03
 */
class Boolean extends DataTypeAbstract implements BooleanInterface
{
    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function isTrue()
    {
        return ($this->value === true);
    }

    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function isFalse()
    {
        return ($this->value === false);
    }

    /**
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function setFalse()
    {
        $this->setValue(false);

        return $this;
    }

    /**
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function setTrue()
    {
        $this->setValue(true);

        return $this;
    }

    /**
     * @return bool
     * {@inheritdoc}
     */
    protected function castToType($value)
    {
        return (bool) $value;
    }
}
