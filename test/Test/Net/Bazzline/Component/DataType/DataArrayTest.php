<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-01 
 */

namespace Test\Net\Bazzline\Component\DataType;

use Net\Bazzline\Component\DataType\DataArray;

/**
 * Class DataArrayTest
 *
 * @package Test\Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-01
 */
class DataArrayTest extends TestCase
{
    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-01
     */
    public static function mergeTestCaseDataProvider()
    {
        return array(
            'simple array merge with simple array' => array(
                'origin' => new DataArray(array(
                    'foo' => 'foo',
                    'bar' => 'foo'
                )),
                'merge' => new DataArray(array(
                    'foo' => 'bar',
                    'bar' => 'foo'
                )),
                'expected' => new DataArray(array(
                    'foo' => 'bar',
                    'bar' => 'foo'
                ))
            )
        );
    }

    /**
     * @dataProvider mergeTestCaseDataProvider
     *
     * @param DataArray $origin
     * @param DataArray $merge
     * @param DataArray $expected
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-01
     */
    public function testMerge(DataArray $origin, DataArray $merge, DataArray $expected)
    {
        $origin->merge($merge);

        $this->assertEquals($origin, $expected);
    }
}
