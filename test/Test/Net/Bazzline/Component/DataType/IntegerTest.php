<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-03 
 */

namespace Test\Net\Bazzline\Component\DataType;

use Net\Bazzline\Component\DataType\Integer;

/**
 * Class IntegerTest
 *
 * @package Test\Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-03
 */
class IntegerTest extends TestCase
{
    /**
     * @return array
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public static function oddOrEvenDataProvider()
    {
        return array(
            'null' => array(
                'value' => null,
                'odd' => false,
                'even' => true,
            ),
            '1' => array(
                'value' => 1,
                'odd' => true,
                'even' => false
            ),
            '2' => array(
                'value' => 2,
                'odd' => false,
                'even' => true
            ),
            '2.1' => array(
                'value' => 2.1,
                'odd' => false,
                'even' => true
            ),
            '4ns6,2.8' => array(
                'value' => '4ns6,2.8',
                'odd' => false,
                'even' => true
            ),
            '3ns6,2.8' => array(
                'value' => '3ns6,2.8',
                'odd' => true,
                'even' => false
            ),
            'ab12,31.2' => array(
                'value' => 'ab12,31.2',
                'odd' => false,
                'even' => true
            )
        );
    }

    /**
     * @dataProvider oddOrEvenDataProvider
     *
     * @param mixed $value
     * @param bool $isOdd
     * @param bool $isEven
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    public function testIsOddOrEven($value, $isOdd, $isEven)
    {
        $type = $this->createNewType($value);

        $this->assertEquals($isEven, $type->isEven());
        $this->assertEquals($isOdd, $type->isOdd());
    }

    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-04
     */
    public function testEqualValue()
    {
        $integerOne = $this->createNewType(2932);
        $integerTwo = $this->createNewType(2932);

        $this->assertTrue(($integerOne == $integerTwo));
        $this->assertFalse(($integerOne === $integerTwo));
    }

    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-04
     */
    public function testWorkWithNativeType()
    {
        $integer = $this->createNewType(1);
        $value = 2;
        $sum = "$integer" + $value; //you have to cast it to string since php has no magic __toInteger method we can overwrite

        $this->assertEquals(3, $sum);
    }

    /**
     * @param mixed $value
     * @return \Net\Bazzline\Component\DataType\Integer
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    private function createNewType($value = null)
    {
        return new Integer($value);
    }
}