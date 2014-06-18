<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-12 
 */

namespace Net\Bazzline\Component\DataType;

use ArrayObject;
use ArrayIterator;

/**
 * Class Collection
 * Uses http://php.net/manual/en/class.arrayobject.php
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-12
 */
class Collection extends ArrayObject implements CollectionInterface
{
    /**
     * @var \ArrayIterator
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    protected $iterator;

    /**
     * Adds element
     *
     * @param $element
     * @return int - number of elements in the collection
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function push($element)
    {
        return $this->prepend($element);
    }

    /**
     * Validates if provided element is part of the collection
     *
     * @param $element
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function contains($element)
    {
        return in_array($element, $this->getArrayCopy(), true);
    }

    /**
     * Removes all elements from the collection
     *
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function clear()
    {
        $this->exchangeArray(array());

        return $this;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Create a new iterator from an ArrayObject instance
     * @link http://php.net/manual/en/arrayobject.getiterator.php
     * @return ArrayIterator An iterator from an <b>ArrayObject</b>.
     */
    public function getIterator()
    {
        if (is_null($this->iterator)) {
            $this->iterator = new ArrayIterator($this);
        }

        return $this->iterator;
    }

    /**
     * Returns collection of elements that are not in the current collection but
     *  in the provided collection
     *
     * @param CollectionInterface $collection
     * @return CollectionInterface
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function diff(CollectionInterface $collection)
    {
        // TODO: Implement diff() method.
    }

    /**
     * Returns element by $key
     *
     * @param $key
     * @return mixed
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function get($key)
    {
        // TODO: Implement get() method.
    }

    /**
     * Validates if collection has entry for $key
     *
     * @param $key
     * @return mixed
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function has($key)
    {
        // TODO: Implement has() method.
    }

    /**
     * Validates if current element is on an even position in the collection
     *
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function isEven()
    {
        // TODO: Implement isEven() method.
    }

    /**
     * Validates if current element is the first element in the collection
     *
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function isFirst()
    {
        // TODO: Implement isFirst() method.
    }

    /**
     * Validates if current element is the first element in the collection
     *
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function isLast()
    {
        // TODO: Implement isLast() method.
    }

    /**
     * Validates if current element is on an odd position in the collection
     *
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function isOdd()
    {
        // TODO: Implement isOdd() method.
    }

    /**
     * Returns removed element from the end
     *
     * @return mixed
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function pop()
    {
        // TODO: Implement pop() method.
    }

    /**
     * Adds element to the end
     *
     * @param $element
     * @return int - number of elements in the collection
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function prepend($element)
    {
        // TODO: Implement prepend() method.
    }

    /**
     * Returns removed element
     *
     * @param $key
     * @return mixed
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function remove($key)
    {
        // TODO: Implement remove() method.
    }

    /**
     * Returns removed element from the beginning
     *
     * @return mixed
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function shift()
    {
        // TODO: Implement shift() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     *
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        // TODO: Implement current() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     *
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        // TODO: Implement next() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     *
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        // TODO: Implement key() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     *
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        // TODO: Implement valid() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     *
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
    }
}
