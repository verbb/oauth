<?php

namespace verbb\auth\providers\gotowebinar\resultset;

interface ResultSetInterface extends \IteratorAggregate, \ArrayAccess, \Serializable, \Countable, \JsonSerializable
{

    /**
     * Return just the data, free of pagination setups and other stuffs.
     */
    public function getData(): \ArrayObject;
}
