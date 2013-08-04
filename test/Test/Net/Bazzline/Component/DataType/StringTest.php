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
            ),
            'empty string' => array(
                'value' => '',
                'length' => 0
            ),
            'char' => array(
                'value' => 'a',
                'length' => 1
            ),
            '1' => array(
                'value' => 1,
                'length' => 1
            ),
            'string with numbers' => array(
                'value' => 'asd 12, 23',
                'length' => 10
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
            ),
            'empty string' => array(
                'value' => '',
                'trimmed' => ''
            ),
            'whitespaces at the beginning' => array(
                'value' => ' foo',
                'trimmed' => 'foo'
            ),
            'whitespaces at the end' => array(
                'value' => 'foo ',
                'trimmed' => 'foo'
            ),
            'whitespaces at beginning and the end' => array(
                'value' => ' foo ',
                'trimmed' => 'foo'
            ),
            'whitespaces between two words' => array(
                'value' => 'hi there',
                'trimmed' => 'hi there'
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
            'null with null as search and null as replace but with ignore case' => array(
                'value' => null,
                'search' => null,
                'replace' => null,
                'ignoreCase' => true,
                'expected' => ''
            ),
            'null with null as search and no as replace but with ignore case' => array(
                'value' => null,
                'search' => null,
                'replace' => '',
                'ignoreCase' => true,
                'expected' => ''
            ),
            'null with no as search and null as replace but with ignore case' => array(
                'value' => null,
                'search' => '',
                'replace' => null,
                'ignoreCase' => true,
                'expected' => ''
            ),
            'empty string with no as search and null as replace but with ignore case' => array(
                'value' => '',
                'search' => null,
                'replace' => null,
                'ignoreCase' => true,
                'expected' => ''
            ),
            'empty string with no search and no replace but with ignore case' => array(
                'value' => '',
                'search' => '',
                'replace' => '',
                'ignoreCase' => true,
                'expected' => ''
            ),
            'string with no search and no replace but with ignore case' => array(
                'value' => 'foo',
                'search' => '',
                'replace' => '',
                'ignoreCase' => true,
                'expected' => 'foo'
            ),
            'string with search and no replace but with ignore case' => array(
                'value' => 'foo',
                'search' => 'bar',
                'replace' => '',
                'ignoreCase' => true,
                'expected' => 'foo'
            ),
            'string with no search and replace but with ignore case' => array(
                'value' => 'foo',
                'search' => '',
                'replace' => 'bar',
                'ignoreCase' => true,
                'expected' => 'foo'
            ),
            'string with search and replace but with ignore case' => array(
                'value' => 'foo',
                'search' => 'foo',
                'replace' => 'bar',
                'ignoreCase' => true,
                'expected' => 'bar'
            ),
            'string with char as search and replace but with ignore case' => array(
                'value' => 'foo',
                'search' => 'o',
                'replace' => 'bar',
                'ignoreCase' => true,
                'expected' => 'fbarbar'
            ),
            'string with search and char as replace but with ignore case' => array(
                'value' => 'foo',
                'search' => 'foo',
                'replace' => 'a',
                'ignoreCase' => true,
                'expected' => 'a'
            ),
            'string with search and replace and no ignore case' => array(
                'value' => 'there is nO foo without a bar',
                'search' => 'O',
                'replace' => 'o',
                'ignoreCase' => false,
                'expected' => 'there is no foo without a bar'
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
            ),
            'text with searchable text and ignore case' => array(
                'value' => 'there is no fOo without a bar',
                'search' => 'foo',
                'ignoreCase' => true,
                'contains' => true
            ),
            'text with searchable text and no ignore case' => array(
                'value' => 'there is no fOo without a bar',
                'search' => 'foo',
                'ignoreCase' => false,
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
            ),
            'text with searchable text and ignore case' => array(
                'value' => 'there is no foo without a bar',
                'search' => 'foo',
                'ignoreCase' => true,
                'startsWith' => false
            ),
            'text with searchable text and no ignore case' => array(
                'value' => 'there is no foo without a bar',
                'search' => 'There',
                'ignoreCase' => false,
                'startsWith' => false
            ),
            'text with fitting searchable text and ignore case' => array(
                'value' => 'there is no foo without a bar',
                'search' => 'There',
                'ignoreCase' => true,
                'startsWith' => true
            ),
            'text with fitting searchable text and no ignore case' => array(
                'value' => 'there is no foo without a bar',
                'search' => 'there',
                'ignoreCase' => true,
                'startsWith' => true
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
            'null text with null searchable text and ignore case' => array(
                'value' => null,
                'search' => null,
                'ignoreCase' => true,
                'endsWith' => true
            ),
            'empty text with no searchable text and ignore case' => array(
                'value' => '',
                'search' => '',
                'ignoreCase' => true,
                'endsWith' => true
            ),
            'text with no searchable text and ignore case' => array(
                'value' => 'There is no foo without a bar.',
                'search' => '',
                'ignoreCase' => true,
                'endsWith' => false
            ),
            'text with ending whitespace and no searchable text and ignore case' => array(
                'value' => 'There is no foo without a bar. ',
                'search' => '',
                'ignoreCase' => true,
                'endsWith' => false
            ),
            'text with and searchable text and ignore case' => array(
                'value' => 'There is no foo without a bar.',
                'search' => 'bar.',
                'ignoreCase' => true,
                'endsWith' => true
            ),
            'text with and searchable text and no ignore case' => array(
                'value' => 'There is no foo without a bar.',
                'search' => 'bAr.',
                'ignoreCase' => false,
                'endsWith' => false
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
            ),
            'empty string' => array(
                'value' => '',
                'lower' => '',
                'upper' => ''
            ),
            'camel case' => array(
                'value' => 'thEre Is nO FoO wITHouT A bAr',
                'lower' => 'there is no foo without a bar',
                'upper' => 'THERE IS NO FOO WITHOUT A BAR'
            ),
            'lower case' => array(
                'value' => 'there is no foo without a bar',
                'lower' => 'there is no foo without a bar',
                'upper' => 'THERE IS NO FOO WITHOUT A BAR'
            ),
            'upper case' => array(
                'value' => 'THERE IS NO FOO WITHOUT A BAR',
                'lower' => 'there is no foo without a bar',
                'upper' => 'THERE IS NO FOO WITHOUT A BAR'
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
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public function testEqualValue()
    {
        $stringOne = $this->createNewType('string with whitespaces and number from 1 to 9.');
        $stringTwo = $this->createNewType('string with whitespaces and number from 1 to 9.');

        $this->assertTrue(($stringOne == $stringTwo));
        $this->assertFalse(($stringOne === $stringTwo));
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public function testWorkWithNativeType()
    {
        $string = $this->createNewType('There is no foo without a ');
        $value = 'bar';
        $concatenation = $string . $value;

        $this->assertEquals('There is no foo without a bar', $concatenation);
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