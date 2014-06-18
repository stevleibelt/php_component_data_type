<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-03 
 */

namespace Test\Net\Bazzline\Component\DataType;

use Mockery;
use PHPUnit_Framework_TestCase;

/**
 * Class TestCase
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-03
 */
class TestCase extends  PHPUnit_Framework_TestCase
{
    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-03
     */
    protected function tearDown()
    {
        Mockery::close();
    }
}