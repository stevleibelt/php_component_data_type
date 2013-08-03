<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03
 */

namespace Net\Bazzline\Component\DataType;

/**
 * Class String
 * Main part of the implementation is taken from: https://raw.github.com/stevleibelt/php_component_utility/master/source/Net/Bazzline/Component/Utility/String.php
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03
 * @todo implement ArrayAccess, Iterator, Traversable
 */
class String extends DataTypeAbstract
{
    /**
     * @return int
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function length()
    {
        return strlen($this->value);
    }

    /**
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function trim()
    {
        $this->value = trim($this->value);

        return $this;
    }

    /**
     * @param string|array $search
     * @param string|array $replace
     * @param bool $ignoreCase
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function replace($search, $replace, $ignoreCase = true)
    {
        if ($ignoreCase) {
            $this->value = str_ireplace($search, $replace, $this->value);
        } else {
            $this->value = str_replace($search, $replace, $this->value);
        }

        return $this;
    }

    /**
     * @param string $search
     * @param bool $ignoreCase
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function contains($search, $ignoreCase = true)
    {
        $this->throwInvalidArgumentExceptionIfValueIsEmptyString($search);

        if ($ignoreCase) {
            return (stripos($this->value, $search) !== false);
        } else {
            return (strpos($this->value, $search) !== false);
        }
    }

    /**
     * @param string $prefix
     * @param bool $ignoreCase
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function startsWith($prefix, $ignoreCase = true)
    {
        $this->throwInvalidArgumentExceptionIfValueIsEmptyString($prefix);

        if ($ignoreCase) {
            return stripos($this->value, $prefix) === 0;
        } else {
            return strpos($this->value, $prefix) === 0;
        }
    }

    /**
     * @param string $suffix
     * @param bool $ignoreCase
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function endsWith($suffix, $ignoreCase = true)
    {
        if ($ignoreCase) {
            return strtolower(substr($this->value, 0 - strlen($suffix))) == strtolower($suffix);
        } else {
            return substr($this->value, 0 - strlen($suffix)) == $suffix;
        }
    }

    /**
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function toLower()
    {
        return strtolower($this->value);
    }

    /**
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function toUpper()
    {
        return strtoupper($this->value);
    }

    /**
     * @return string
     * {@inheritdoc}
     */
    protected function castToType($value)
    {
        return (string) $value;
    }

    /**
     * @param $string
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    private function throwInvalidArgumentExceptionIfValueIsEmptyString($string)
    {
        if (strlen($string) == 0) {
            throw new InvalidArgumentException(
                'empty string provided'
            );
        }
    }
}
