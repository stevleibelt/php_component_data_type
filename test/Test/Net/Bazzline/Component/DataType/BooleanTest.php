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
     * @var \Net\Bazzline\Component\DataType\Boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    private $type;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    protected function setUp()
    {
        $this->type = new Boolean();
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testNoValueSet()
    {
        $this->assertFalse($this->type->getValue());
        $this->assertFalse($this->type->isFalse());
        $this->assertFalse($this->type->isTrue());
        $this->assertEquals('', $this->type);
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
            ),
            'object' => array(
                'value' => new Boolean(),
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
        $this->type->setValue($value);

        $this->assertEquals($expectedValue, $this->type->getValue());
        $this->assertEquals($asString, '' . $this->type);
        $this->assertEquals($isTrue, $this->type->isTrue());
        $this->assertEquals($isFalse, $this->type->isFalse());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testSetFalse()
    {
        $this->type->setFalse();

        $this->assertFalse($this->type->getValue());
        $this->assertTrue($this->type->isFalse());
        $this->assertFalse($this->type->isTrue());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testSetTrue()
    {
        $this->type->setTrue();

        $this->assertTrue($this->type->getValue());
        $this->assertFalse($this->type->isFalse());
        $this->assertTrue($this->type->isTrue());
    }
}