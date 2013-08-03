<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03 
 */

namespace Test\Net\Bazzline\Component\DataType;

use Net\Bazzline\Component\DataType\Boolean;

/**
 * Class BooleanTest
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03
 */
class BooleanTest extends TestCase
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testNoValueSet()
    {
        $type = $this->createNewType();

        $this->assertFalse($type->getValue());
        $this->assertTrue($type->isFalse());
        $this->assertFalse($type->isTrue());
        $this->assertEquals('', $type);
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public static function testCaseProvider()
    {
        return array(
            'null' => array(
                'value' => null,
                'expected' => false,
                'string' => '',
                'false' => true,
                'true' => false
            ),
            'false' => array(
                'value' => false,
                'expected' => false,
                'string' => '',
                'false' => true,
                'true' => false
            ),
            'true' => array(
                'value' => true,
                'expected' => true,
                'string' => '1',
                'false' => false,
                'true' => true
            ),
            'char' => array(
                'value' => 'a',
                'expected' => true,
                'string' => '1',
                'false' => false,
                'true' => true
            ),
            'string' => array(
                'value' => 'string',
                'expected' => true,
                'string' => '1',
                'false' => false,
                'true' => true
            ),
            'int' => array(
                'value' => 1,
                'expected' => true,
                'string' => '1',
                'false' => false,
                'true' => true
            ),
            'float' => array(
                'value' => 1.1,
                'expected' => true,
                'string' => '1',
                'false' => false,
                'true' => true
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
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testSetAndGet($value, $expectedValue, $asString, $isFalse, $isTrue)
    {
        $type = $this->createNewType();
        $type->setValue($value);

        $this->assertEquals($expectedValue, $type->getValue());
        $this->assertEquals($asString, '' . $type);
        $this->assertEquals($isTrue, $type->isTrue());
        $this->assertEquals($isFalse, $type->isFalse());
    }

    /**
     * @dataProvider testCaseProvider
     *
     * @param mixed $value
     * @param bool $expectedValue
     * @param string $asString
     * @param bool $isFalse
     * @param bool $isTrue
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testConstructor($value, $expectedValue, $asString, $isFalse, $isTrue)
    {
        $type = $this->createNewType($value);

        $this->assertEquals($expectedValue, $type->getValue());
        $this->assertEquals($asString, '' . $type);
        $this->assertEquals($isTrue, $type->isTrue());
        $this->assertEquals($isFalse, $type->isFalse());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testSetFalse()
    {
        $type = $this->createNewType();
        $type->setFalse();

        $this->assertFalse($type->getValue());
        $this->assertTrue($type->isFalse());
        $this->assertFalse($type->isTrue());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testSetTrue()
    {
        $type = $this->createNewType();
        $type->setTrue();

        $this->assertTrue($type->getValue());
        $this->assertFalse($type->isFalse());
        $this->assertTrue($type->isTrue());
    }

    /**
     * @param mixed $value
     * @return \Net\Bazzline\Component\DataType\Boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    private function createNewType($value = null)
    {
        return new Boolean($value);
    }
}