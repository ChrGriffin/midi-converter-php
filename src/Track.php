<?php

namespace MidiConverter;

use ArrayAccess;
use Countable;

class Track implements ArrayAccess, Countable
{
    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->data);
    }

    public function offsetGet($offset)
    {
        return $this->data[$offset] ?? null;
    }

    public function offsetSet($offset, $value): void
    {
        $this->data[$offset] = $value;
    }

    public function offsetUnset($offset): void
    {
        unset($this->data[$offset]);
    }

    public function count()
    {
        return count($this->data);
    }
}
