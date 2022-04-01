<?php

namespace OpenBreweries;

class BreweriesIterator implements \Iterator {
    private $breweries;

    public function __construct(array $breweries) {
        $this->breweries = $breweries;
        $this->rewind();
    }

    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->breweries[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->breweries[$this->position]);
    }


}