<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-12 
 */

namespace Net\Bazzline\Component\DataType;

use ArrayAccess;
use Countable;
use Iterator;
use IteratorAggregate;
use Serializable;

/**
 * Class CollectionInterface
 * Influenced by https://github.com/propelorm/Propel/blob/master/runtime/lib/collection/PropelCollection.php
 *
 * @package Net\Bazzline\Component\DataType
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-12
 */
interface CollectionInterface extends ArrayAccess, Countable, Iterator, IteratorAggregate, Serializable
{
    /**
     * Adds element to the end
     *
     * @param $element
     * @return int - number of elements in the collection
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function push($element);

    /**
     * Validates if provided element is part of the collection
     *
     * @param $element
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function contains($element);

    /**
     * Removes all elements from the collection
     *
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function clear();

    /**
     * Returns collection of elements that are not in the current collection but
     *  in the provided collection
     *
     * @param CollectionInterface $collection
     * @return CollectionInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function diff(CollectionInterface $collection);

    /**
     * Returns element by $key
     *
     * @param $key
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function get($key);

    /**
     * Validates if collection has entry for $key
     *
     * @param $key
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function has($key);

    /**
     * Validates if current element is on an even position in the collection
     *
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function isEven();

    /**
     * Validates if current element is the first element in the collection
     *
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function isFirst();

    /**
     * Validates if current element is the first element in the collection
     *
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function isLast();

    /**
     * Validates if current element is on an odd position in the collection
     *
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function isOdd();

    /**
     * Returns removed element from the end
     *
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function pop();

    /**
     * Adds element to the beginning
     *
     * @param $element
     * @return int - number of elements in the collection
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function prepend($element);

    /**
     * Returns removed element
     *
     * @param $key
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function remove($key);

    /**
     * Returns removed element from the beginning
     *
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function shift();
}