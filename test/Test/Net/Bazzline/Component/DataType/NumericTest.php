<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03 
 */

namespace Test\Net\Bazzline\Component\DataType;

use Net\Bazzline\Component\DataType\Numeric;

/**
 * Class NumericTest
 *
 * @package Test\Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03
 */
class NumericTest extends TestCase
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testAdd()
    {
        $type = $this->createNewType(1);

        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\Numeric', $type->add(2));
        $this->assertEquals(3, $type->getValue());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testSubtract()
    {
        $type = $this->createNewType(2);

        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\Numeric', $type->subtract(1));
        $this->assertEquals(1, $type->getValue());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testMultiply()
    {
        $type = $this->createNewType(2);

        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\Numeric', $type->multiply(2));
        $this->assertEquals(4, $type->getValue());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testDevide()
    {
        $type = $this->createNewType(2);

        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\Numeric', $type->divide(2));
        $this->assertEquals(1, $type->getValue());
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public static function positiveNegativeAndZeroDataProvider()
    {
        return array(
            'null' => array(
                'value' => null,
                'positive' => false,
                'negative' => false,
                'zero' => true
            ),
            '0' => array(
                'value' => 0,
                'positive' => false,
                'negative' => false,
                'zero' => true
            ),
            '1' => array(
                'value' => 1,
                'positive' => true,
                'negative' => false,
                'zero' => false
            ),
            '-1' => array(
                'value' => -1,
                'positive' => false,
                'negative' => true,
                'zero' => false
            ),
            '0a' => array(
                'value' => '0a',
                'positive' => false,
                'negative' => false,
                'zero' => true
            ),
            '1a' => array(
                'value' => '1a',
                'positive' => true,
                'negative' => false,
                'zero' => false
            ),
            '-1a' => array(
                'value' => '-1a',
                'positive' => false,
                'negative' => true,
                'zero' => false
            ),
            'a' => array(
                'value' => 'a',
                'positive' => false,
                'negative' => false,
                'zero' => true
            )
        );
    }

    /**
     * @dataProvider positiveNegativeAndZeroDataProvider
     *
     * @param mixed $value
     * @param bool $isPositive
     * @param bool $isNegative
     * @param bool $isZero
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testIsPositiveIsNegativeAndIsZero($value, $isPositive, $isNegative, $isZero)
    {
        $type = $this->createNewType($value);

        $this->assertEquals($isPositive, $type->isPositive());
        $this->assertEquals($isNegative, $type->isNegative());
        $this->assertEquals($isZero, $type->isZero());
    }

    public static function comparisonDataProvider()
    {
        return array(
            'greater' => array(
                'value' => 1,
                'comparison' => 0,
                'greater' => true,
                'less' => false,
                'equal' => false
            ),
            'less' => array(
                'value' => 1,
                'comparison' => 2,
                'greater' => false,
                'less' => true,
                'equal' => false
            ),
            'equal' => array(
                'value' => 1,
                'comparison' => 1,
                'greater' => false,
                'less' => false,
                'equal' => true
            )
        );
    }

    /**
     * @dataProvider comparisonDataProvider
     *
     * @param mixed $value
     * @param mixed $comparison
     * @param bool $isGreater
     * @param bool $isLess
     * @param bool $isEqual
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testComparisonMethods($value, $comparison, $isGreater, $isLess, $isEqual)
    {
        $type = $this->createNewType($value);

        $this->assertEquals($isGreater, $type->isGreater($comparison));
        $this->assertEquals(($isGreater || $isEqual), $type->isGreaterOrEqual($comparison));
        $this->assertEquals($isLess, $type->isLess($comparison));
        $this->assertEquals(($isLess || $isEqual), $type->isLessOrEqual($comparison));
        $this->assertEquals($isEqual, $type->isEqual($comparison));
    }

    /**
     * @param mixed $value
     * @return Numeric
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    private function createNewType($value = null)
    {
        return new Numeric($value);
    }
}