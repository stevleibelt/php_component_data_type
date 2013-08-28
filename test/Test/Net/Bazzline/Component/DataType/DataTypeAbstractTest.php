<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03 
 */

namespace Test\Net\Bazzline\Component\DataType;

use Mockery;

/**
 * Class DataTypeAbstractTest
 *
 * @package Test\Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-03
 */
class DataTypeAbstractTest extends TestCase
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    protected function tearDown()
    {
        Mockery::close();
    }

    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public static function invalidValueProvider()
    {
        return array(
            'object' => array(
                'value' => new Mockery()
            ),
            'resource' => array(
                'value' => opendir(__DIR__)
            )
        );
    }

    /**
     * @expectedException \Net\Bazzline\Component\DataType\InvalidArgumentException
     * @expectedExceptionMessage resource or object given
     * @dataProvider invalidValueProvider
     *
     * @param mixed $value
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testConstructorWithInvalidValues($value)
    {
        $this->createNewType($value);
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-08
     */
    public function testImplementedInterfaces()
    {
        $type = $this->createNewType();

        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\ArrayableInterface', $type);
        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\BooleanableInterface', $type);
        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\DataTypeInterface', $type);
        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\FloatingPointableInterface', $type);
        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\IntegerableInterface', $type);
        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\NumericableInterface', $type);
        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\StringableInterface', $type);
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testSetAndGetValue()
    {
        $value = 42;
        $type = $this->createNewType($value);

        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\DataTypeAbstract', $type->setValue($value));
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    public function testTypeCastMethods()
    {
        $type = $this->createNewType();

        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\Boolean', $type->toBoolean());
        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\FloatingPoint', $type->toFloatingPoint());
        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\Numeric', $type->toNumeric());
        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\String', $type->toString());
        $this->assertInstanceOf('\Net\Bazzline\Component\DataType\Integer', $type->toInteger());
    }

    /**
     * @param $value
     * @return Mockery\MockInterface|\Net\Bazzline\Component\DataType\DataTypeAbstract
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-03
     */
    private function createNewType($value = null)
    {
        //partial mock explained at: http://blog.jodet.com/posts/2013-01-14-partial-mocks-with-mockery.htm
        $type = Mockery::mock(
            'Net\Bazzline\Component\DataType\DataTypeAbstract[castToType]',
            array($value)
        );

        return $type;
    }
}
