<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03 
 */

namespace Test\Net\Bazzline\Component\DataType;

use Net\Bazzline\Component\DataType\FloatingPoint;

/**
 * Class FloatingPointTest
 *
 * @package Test\Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03
 */
class FloatingPointTest extends TestCase
{
    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public static function castTestCases()
    {
        return array(
            'null' => array(
                'value' => null,
                'casted' => 0
            ),
            '1' => array(
                'value' => 1,
                'casted' => 1
            ),
            '-1' => array(
                'value' => -1,
                'casted' => -1
            ),
            '.2' => array(
                'value' => .2,
                'casted' => 0.2
            ),
            '0.2' => array(
                'value' => 0.2,
                'casted' => 0.2
            ),
            '1.2' => array(
                'value' => 1.2,
                'casted' => 1.2
            ),
            '1,2' => array(
                'value' => '1,2',
                'casted' => 1
            ),
            'a1,2' => array(
                'value' => 'a1,2',
                'casted' => 0
            )
        );
    }

    /**
     * @dataProvider castTestCases
     *
     * @param mixed $value
     * @param float $expectedCastingValue
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public function testCastToType($value, $expectedCastingValue)
    {
        $type = $this->createNewType($value);

        $this->assertEquals($expectedCastingValue, $type->getValue());
    }

    /**
     * @param mixed $value
     * @return \Net\Bazzline\Component\DataType\FloatingPoint
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    private function createNewType($value = null)
    {
        return new FloatingPoint($value);
    }
}