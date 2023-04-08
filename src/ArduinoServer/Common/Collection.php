<?php

declare(strict_types=1);

namespace ArduinoServer\Common;

class Collection implements \IteratorAggregate {

    private $items = array();

    /**
     * Adds a new item to the collection
     *
     * @param $item
     * @param string $key
     */
    public function add($item, $key = null) {
        if ($key == null) {
            $this->items[] = $item;
        } else {
            $this->items[$key] = $item;
        }
    }

    /**
     * Adds a array to the collection
     *
     * @param array $items
     */
    public function addAll($items) {
        foreach ($items as $item) {
            $this->items[] = $item;
        }
    }

    /**
     * Adds a array with keys to the collection
     *
     * @param array $items
     */
    public function addAllWithKeys($items) {
        foreach ($items as $key => $item) {
            $this->items[$key] = $item;
        }
    }

    /**
     *
     * Removes a item from the collection fo the given key.
     *
     * @param $key
     * @return boolean
     */
    public function remove($key) {
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        }
        return false;
    }

    /**
     * Returns a item for the given key if found or false.
     *
     * @param $key
     * @return object | boolean
     */
    public function get($key) {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        }
        return false;
    }

    public function getAll() {
        return $this->items;
    }

    /**
     * Returns all collection keys
     *
     * @return array
     */
    public function keys() {
        return array_keys($this->items);
    }

    /**
     * Returns the item count
     *
     * @return number
     */
    public function length() {
        return count($this->items);
    }

    /**
     * Checks if the given key exists.
     *
     * @param
     *            $key
     * @return boolean
     */
    public function exists($key) {
        return isset($this->items[$key]);
    }

    /**
     * Returns the an ArrayIterator.
     *
     * @return \ArrayIterator
     */
    public function getIterator() {
        return new \ArrayIterator($this->items);
    }

}
