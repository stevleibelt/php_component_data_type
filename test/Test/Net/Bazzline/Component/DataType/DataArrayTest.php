<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-01 
 */

namespace Test\Net\Bazzline\Component\DataType;

use Net\Bazzline\Component\DataType\DataArray;

/**
 * Class DataArrayTest
 *
 * @package Test\Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-01
 */
class DataArrayTest extends TestCase
{
    /**
     * @return array
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-01
     * @todo testcases, testcases, testcases
     */
    public static function mergeTestCaseDataProvider()
    {
        return array(
            'plain with plain' => array(
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
            'plain with plain and overwrite off' => array(
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
            'plain with complex' => array(
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
            ),
            'complex with complex' => array(
                'origin' => new DataArray(array(
                    'foo' => array(
                        'bar' => 'barz'
                    )
                )),
                'merge' => new DataArray(array(
                    'foo' => array(
                        'bar' => 'foobar'
                    )
                )),
                'expected' => new DataArray(array(
                    'foo' => array(
                        'bar' => 'foobar'
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
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-01
     */
    public function testMerge(DataArray $origin, DataArray $merge, DataArray $expected, $overwrite)
    {
        $origin->merge($merge, $overwrite);

        $this->assertEquals($origin, $expected);
    }
}
