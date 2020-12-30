<?php

namespace MidiConverter;

use ArrayAccess;
use Countable;

class Track implements ArrayAccess, Countable
{
    public array $events;

    public function __construct(array $events)
    {
        $this->events = $events;
    }

    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->events);
    }

    public function offsetGet($offset)
    {
        return $this->events[$offset] ?? null;
    }

    public function offsetSet($offset, $value): void
    {
        $this->events[$offset] = $value;
    }

    public function offsetUnset($offset): void
    {
        unset($this->events[$offset]);
    }

    public function count()
    {
        return count($this->events);
    }
}
