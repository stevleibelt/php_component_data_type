# PHP Component - Data Type

This component includes class definitions for php basic data types like:
* Boolean
* Floating point
* Integer
* String
* Numeric
* DataArray

By using this component, you are able to use type hints also for basic data types.

The build status of the current master branch is tracked by Travis CI: 
[![Build Status](https://travis-ci.org/stevleibelt/php_component_data_type.png?branch=master)](http://travis-ci.org/stevleibelt/php_component_data_type)

# Features

* Enables type hints for basic php types
* Types shipped with useful methods
* Are comparable with native php types by using "=="
* Provides generic type casting by implemented "toString()" methods (and so on)
* Provides type migration by *from* and *to* methods

# Usage

## Example

```php
/**
 * Class with type hint for string
 *
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-04
 */
class MyClass
{
    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    private $strings = array();

    /**
     * Super cool method with type hint for string
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-04
     */
    public function addString(\Net\Bazzline\Component\DataType\String $string)
    {
        $this->strings[] = $string;

        return $this;
    }
}

$myString = new \Net\Bazzline\Component\DataType\String('super cool test string');

$myClass = new MyClass();
$myClass->addString($myString);
```

## Hints

* Extend provided types with classes in own namespace.
* If you add a super cool method to your type, push it and be a part of the development team

# Install

## Via Git

```shell
cd path/to/my/git/respositories
mkdir -p stevleibelt/php_component_data_type
cd stevleibelt/php_component_data_type

git clone git://github.com/stevleibelt/php_component_data_type.git .
```

## Via Composer

```shell
require: "net_bazzline/component_data_type": "dev-master"
```

# Why?

I started developing this component because of the many casts i have to do while dealing with php's basic data types.
As general, i searched the web for existing and easy to use components but could not find them. If you find one, please tell me.
Last but not least [SplTypes](http://php.net/manual/en/intro.spl-types.php) are still experimental.

# To Do

* Cover existing unittest with validation of implemented interfaces
* Can we use [pack](http://de2.php.net/manual/en/function.pack.php)?
* Add modulo to Numeric
* Add locking (mark a value as read only)
* Add Date type -> check [Joda Time](http://joda-time.sourceforge.net/)
* Add Time type
* Add DateTime type
* Add arrayAccess to string
* Add collection
* Add examples
* Add benchmarks
* [Option type](https://github.com/schmittjoh/php-option)?
* [Enum](https://github.com/marc-mabe/php-enum)?
* Add [invoke](http://www.php.net/manual/en/language.oop5.magic.php#object.invoke) to String?

# Links

Following are links i found and used for creating this component.

* [type juggling](http://php.net/manual/en/language.types.type-juggling.php)
* [type casing](http://www.phpro.org/tutorials/PHP-Type-Casting.html#4.7)
* [machine data type](http://en.wikipedia.org/wiki/Data_type#Machine_data_types)
* [list of php resource types](http://php.net/manual/en/resource.php)
* [php_component_data_type at ohloh.net](https://www.ohloh.net/p/php_component_data_type)

## Other Implementations

* [h4kuna/data-type](https://github.com/h4kuna/data-type)

# History

* next
    * Coverd existing classes with "ableInterface" where each defines a *from$Type* and *to$Type* method
    * Started class for array called DataArray
    * Implemented usage of LockInterface, now you can lock a datatype to prevent from value changes
* [1.1.0](https://github.com/stevleibelt/php_component_data_type/tree/1.1.0)
    * Updated readme
    * Implemented *isEmpty* method which leads to different behaviour while creating an object
* [1.0.0](https://github.com/stevleibelt/php_component_data_type/tree/1.0.0)
    * Finished data type Boolean
    * Finished data type FloatingPoint
    * Finished data type Numierc
    * Finished data type Integer
    * Finished data type String 
