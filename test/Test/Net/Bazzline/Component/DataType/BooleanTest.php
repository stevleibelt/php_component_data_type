<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-03 
 */

namespace Test\Net\Bazzline\Component\DataType;

use Net\Bazzline\Component\DataType\Boolean;

/**
 * Class BooleanTest
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-03
 */
class BooleanTest extends TestCase
{
    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function testNoValueSet()
    {
        $boolean = $this->createNewType();

        $this->assertNull($boolean->getValue(), __LINE__);
        $this->assertTrue($boolean->isEmpty(), __LINE__);
        $this->assertFalse($boolean->isFalse(), __LINE__);
        $this->assertFalse($boolean->isTrue(), __LINE__);
        $this->assertEquals('', $boolean, __LINE__);
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public static function testCaseProvider()
    {
        return array(
            'null' => array(
                'value' => null,
                'expected' => false,
                'string' => '',
                'false' => false,
                'true' => false,
                'empty' => true
            ),
            'false' => array(
                'value' => false,
                'expected' => false,
                'string' => '',
                'false' => true,
                'true' => false,
                'empty' => false
            ),
            'true' => array(
                'value' => true,
                'expected' => true,
                'string' => '1',
                'false' => false,
                'true' => true,
                'empty' => false
            ),
            'char' => array(
                'value' => 'a',
                'expected' => true,
                'string' => '1',
                'false' => false,
                'true' => true,
                'empty' => false
            ),
            'string' => array(
                'value' => 'string',
                'expected' => true,
                'string' => '1',
                'false' => false,
                'true' => true,
                'empty' => false
            ),
            'int' => array(
                'value' => 1,
                'expected' => true,
                'string' => '1',
                'false' => false,
                'true' => true,
                'empty' => false
            ),
            'float' => array(
                'value' => 1.1,
                'expected' => true,
                'string' => '1',
                'false' => false,
                'true' => true,
                'empty' => false
            )
        );
    }

    /**
     * @dataProvider testCaseProvider
     *
     * @param mixed $value
     * @param bool $expectedValue
     * @param string $asString
     * @param bool $isFalse
     * @param bool $isTrue
     * @param bool $isEmpty
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function testSetAndGet($value, $expectedValue, $asString, $isFalse, $isTrue, $isEmpty)
    {
        $boolean = $this->createNewType();
        $boolean->setValue($value);

        $this->assertEquals($expectedValue, $boolean->getValue(), __LINE__);
        $this->assertEquals($asString, '' . $boolean, __LINE__);
        $this->assertEquals($isTrue, $boolean->isTrue(), __LINE__);
        $this->assertEquals($isFalse, $boolean->isFalse(), __LINE__);
        $this->assertEquals($isEmpty, $boolean->isEmpty(), __LINE__);
    }

    /**
     * @dataProvider testCaseProvider
     *
     * @param mixed $value
     * @param bool $expectedValue
     * @param string $asString
     * @param bool $isFalse
     * @param bool $isTrue
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function testConstructor($value, $expectedValue, $asString, $isFalse, $isTrue)
    {
        $boolean = $this->createNewType($value);

        $this->assertEquals($expectedValue, $boolean->getValue());
        $this->assertEquals($asString, '' . $boolean);
        $this->assertEquals($isTrue, $boolean->isTrue());
        $this->assertEquals($isFalse, $boolean->isFalse());
    }

    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function testSetFalse()
    {
        $boolean = $this->createNewType();
        $boolean->setFalse();

        $this->assertFalse($boolean->getValue(), __LINE__);
        $this->assertTrue($boolean->isFalse(), __LINE__);
        $this->assertFalse($boolean->isTrue(), __LINE__);
        $this->assertFalse($boolean->isEmpty(), __LINE__);
    }

    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function testSetTrue()
    {
        $boolean = $this->createNewType();
        $boolean->setTrue();

        $this->assertTrue($boolean->getValue(), __LINE__);
        $this->assertFalse($boolean->isFalse(), __LINE__);
        $this->assertTrue($boolean->isTrue(), __LINE__);
        $this->assertFalse($boolean->isEmpty(), __LINE__);
    }

    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-04
     */
    public function testEqualValue()
    {
        $booleanOne = $this->createNewType(true);
        $booleanTwo = $this->createNewType(true);

        $this->assertTrue(($booleanOne == $booleanTwo));
        $this->assertFalse(($booleanOne === $booleanTwo));
    }

    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-04
     */
    public function testWorkWithNativeType()
    {
        $boolean = $this->createNewType(false);
        $value = true;
        $or = "$boolean" || $value; //you have to cast it to string since php has no magic __toInteger method we can overwrite
        $and = "$boolean" && $value; //you have to cast it to string since php has no magic __toInteger method we can overwrite

        $this->assertTrue($or);
        $this->assertFalse($and);
    }

    /**
     * @param mixed $value
     * @return \Net\Bazzline\Component\DataType\Boolean
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    private function createNewType($value = null)
    {
        return new Boolean($value);
    }
}