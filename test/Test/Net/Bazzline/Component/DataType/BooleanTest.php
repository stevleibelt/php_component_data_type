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
        $this->assertNull($this->type->get());
        $this->assertFalse($this->type->isFalse());
        $this->assertFalse($this->type->isTrue());
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
                'false' => true,
                'true' => false
            ),
            'char' => array(
                'value' => 'a',
                'expected' => true,
                'false' => false,
                'true' => true
            )
        );
    }

    /**
     * @dataProvider testCaseProvider
     * @param mixed $value
     * @param bool $expectedValue
     * @param bool $isFalse
     * @param bool $isTrue
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testSetAndGet($value, $expectedValue, $isFalse, $isTrue)
    {
        $this->type->set($value);

        $this->assertEquals($expectedValue, $this->type->get());
        $this->assertEquals($isTrue, $this->type->isTrue());
        $this->assertEquals($isFalse, $this->type->isFalse());
    }
}