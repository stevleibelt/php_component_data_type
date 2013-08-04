# PHP Component - Data Type

This component includes class definitions for php basic data types like:
* Boolean
* Floating point
* Integer
* String
* Numeric

By using this component, you are able to use type hints also for basic data types.

The data types are shipped with some simple but useful methods.

# Usage

## Example

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

## Hints

* Extend provided types with classes in own namespace.
* If you add a super cool method to your type, push it and be a part of the development team

# Why?

I started developing this component because of the many casts i have to do while dealing with php's basic data types.
As general, i searched the web for existing and easy to use components but could not find them. If you find one, please tell me.
Last but not least [SplTypes](http://php.net/manual/en/intro.spl-types.php) are still experimental.

# To Do

* Add locking (mark a value as read only)
* Add Date type
* Add arrayAccess to string
* Add collection
* Add examples
* [Option type](https://github.com/schmittjoh/php-option)?
* [Enum](https://github.com/marc-mabe/php-enum)?

# Links

Following are links i found and used for creating this component.

* [type juggling](http://php.net/manual/en/language.types.type-juggling.php)
* [type casing](http://www.phpro.org/tutorials/PHP-Type-Casting.html#4.7)
* [machine data type](http://en.wikipedia.org/wiki/Data_type#Machine_data_types)
* [list of php resource types](http://php.net/manual/en/resource.php)

## Other Implementations

* [h4kuna/data-type](https://github.com/h4kuna/data-type)