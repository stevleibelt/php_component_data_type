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
            'plain array with plain array' => array(
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
                )),
                'overwrite' => true
            ),
            'plain array with plain array and overwrite off' => array(
                'origin' => new DataArray(array(
                    'foo' => 'bar',
                    'bar' => 'foo'
                )),
                'merge' => new DataArray(array(
                    'bar' => 'bar',
                    'foobar' => 'barfoo'
                )),
                'expected' => new DataArray(array(
                    'foo' => 'bar',
                    'bar' => 'foo',
                    'foobar' => 'barfoo'
                )),
                'overwrite' => false
            ),
            'plain array with complex array' => array(
                'origin' => new DataArray(array(
                    'foo' => 'bar',
                    'complex' => 'plain'
                )),
                'merge' => new DataArray(array(
                    'complex' => array(
                        3 => 'int',
                        'string' => 'string',
                        'array' => array(
                            'foo' => 'bar'
                        ),
                        'DataArray' => new DataArray(array(
                            'the message' => 'is love'
                        ))
                    )
                )),
                'expected' => new DataArray(array(
                    'foo' => 'bar',
                    'complex' => array(
                        3 => 'int',
                        'string' => 'string',
                        'array' => array(
                            'foo' => 'bar'
                        ),
                        'DataArray' => new DataArray(array(
                            'the message' => 'is love'
                        ))
                    )
                )),
                'overwrite' => true
            )
        );
    }

    /**
     * @dataProvider mergeTestCaseDataProvider
     *
     * @param DataArray $origin
     * @param DataArray $merge
     * @param DataArray $expected
     * @param bool $overwrite
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-01
     */
    public function testMerge(DataArray $origin, DataArray $merge, DataArray $expected, $overwrite)
    {
        $origin->merge($merge, $overwrite);

        $this->assertEquals($origin, $expected);
    }
}
