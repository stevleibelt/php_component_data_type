<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-04 
 */

namespace Test\Net\Bazzline\Component\DataType;

use Net\Bazzline\Component\DataType\String;

/**
 * Class StringTest
 *
 * @package Test\Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-04
 */
class StringTest extends TestCase
{
    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public static function lengthTestCases()
    {
        return array(
            'null' => array(
                'value' => null,
                'length' => 0
            )
        );
    }

    /**
     * @dataProvider lengthTestCases
     *
     * @param string $value
     * @param string $expectedLength
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testLength($value, $expectedLength)
    {
        $type = $this->createNewType($value);

        $this->assertEquals($expectedLength, $type->length());
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public static function trimTestCases()
    {
        return array(
            'null' => array(
                'value' => null,
                'trimmed' => ''
            )
        );
    }

    /**
     * @dataProvider trimTestCases
     *
     * @param string $value
     * @param string $trimmedValue
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public function testTrim($value, $trimmedValue)
    {
        $type = $this->createNewType($value);
        $type->trim();

        $this->assertEquals($trimmedValue, $type->getValue());
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public static function replaceTestCases()
    {
        return array(
            'empty string with no search and no replace but with ignore case' => array(
                'value' => '',
                'search' => '',
                'replace' => '',
                'ignoreCase' => true,
                'expected' => ''
            )
        );
    }

    /**
     * @dataProvider replaceTestCases
     *
     * @param string $value
     * @param mixed $search
     * @param mixed $replace
     * @param bool $ignoreCase
     * @param string $expectedValue
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public function testReplace($value, $search, $replace, $ignoreCase, $expectedValue)
    {
        $type = $this->createNewType($value);
        $type->replace($search, $replace, $ignoreCase);

        $this->assertEquals($expectedValue, $type->getValue());
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public static function invalidContainsTestCases()
    {
        return array(
            'null' => array(
                'value' => null
            ),
            'empty string' => array(
                'value' => ''
            )
        );
    }

    /**
     * @dataProvider invalidContainsTestCases
     * @expectedException \Net\Bazzline\Component\DataType\InvalidArgumentException
     * @expectedExceptionMessage empty string provided
     *
     * @param mixed $value
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public function testContainsWithInvalidArguments($value)
    {
        $type = $this->createNewType();

        $type->contains($value);
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public static function containsTestCases()
    {
        return array(
            'empty text with searchable text and ignore case' => array(
                'value' => '',
                'search' => 'foo',
                'ignoreCase' => true,
                'contains' => false
            )
        );
    }

    /**
     * @dataProvider containsTestCases
     *
     * @param string $value
     * @param string $contains
     * @param bool $ignoreCase
     * @param string $contains
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public function testContains($value, $search, $ignoreCase, $contains)
    {
        $type = $this->createNewType($value);

        $this->assertEquals($contains, $type->contains($search, $ignoreCase));
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public static function invalidStartsWithTestCases()
    {
        return array(
            'null value and null prefix' => array(
                'value' => null,
                'prefix' => null
            ),
            'value and null prefix' => array(
                'value' => 'test',
                'prefix' => null
            ),
            'empty string empty prefix' => array(
                'value' => '',
                'prefix' => ''
            ),
            'string empty prefix' => array(
                'value' => 'test',
                'prefix' => ''
            )
        );
    }

    /**
     * @dataProvider invalidStartsWithTestCases
     * @expectedException \Net\Bazzline\Component\DataType\InvalidArgumentException
     * @expectedExceptionMessage empty string provided
     *
     * @param string $value
     * @param string $prefix
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public function testInvalidArgumentsForStartsWith($value, $prefix)
    {
        $type = $this->createNewType($value);

        $type->startsWith($prefix);
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public static function startsWithTestCases()
    {
        return array(
            'empty text with searchable text and ignore case' => array(
                'value' => '',
                'search' => 'foo',
                'ignoreCase' => true,
                'startsWith' => false
            )
        );
    }

    /**
     * @dataProvider startsWithTestCases
     *
     * @param string $value
     * @param string $search
     * @param bool $ignoreCase
     * @param string $startsWith
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public function testStartsWith($value, $search, $ignoreCase, $startsWith)
    {
        $type = $this->createNewType($value);

        $this->assertEquals($startsWith, $type->startsWith($search, $ignoreCase));
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public static function endsWithTestCases()
    {
        return array(
            'empty text with no searchable text and ignore case' => array(
                'value' => '',
                'search' => '',
                'ignoreCase' => true,
                'endsWith' => true
            )
        );
    }

    /**
     * @dataProvider endsWithTestCases
     *
     * @param string $value
     * @param string $search
     * @param bool $ignoreCase
     * @param string $endsWith
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public function testEndsWith($value, $search, $ignoreCase, $endsWith)
    {
        $type = $this->createNewType($value);

        $this->assertEquals($endsWith, $type->endsWith($search, $ignoreCase));
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public static function toLowerOrUpperTestCases()
    {
        return array(
            'null' => array(
                'value' => null,
                'lower' => '',
                'upper' => ''
            )
        );
    }

    /**
     * @dataProvider toLowerOrUpperTestCases
     *
     * @param string $value
     * @param string $toLower
     * @param string $toUpper
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public function testToLowerOrUpper($value, $toLower, $toUpper)
    {
        $type = $this->createNewType($value);

        $this->assertEquals($toLower, $type->toLower());
        $this->assertEquals($toUpper, $type->toUpper());
    }

    /**
     * @param mixed $value
     * @return \Net\Bazzline\Component\DataType\String
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    private function createNewType($value = null)
    {
        return new String($value);
    }
}