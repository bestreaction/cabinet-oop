<?php

class Shelf implements ArrayAccess, Countable
{
    const VOL = 20;

    private $items = [];

    public function offsetSet($offset, $value)
    {
        if (count($this->items) === self::VOL) {
            throw new ShelfIsFullException();
        }
        
        if (is_null($offset)) {
            $this->items[] = $value;
        }
        else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->items[$offset]) ? $this->items[$offset] : null;
    }

    public function count(): int
    {
        return count($this->items);
    }

}