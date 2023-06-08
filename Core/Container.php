<?php

namespace Core;

use Exception;

/**
 * A simple dependency injection container.
 * @package Core
 */
class Container
{
    protected $bindings = [];

    /**
     * Adds a binding to the container.
     */
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    /**
     * Removes from the container the binding with the given abstract.
     * @throws Exception
     */
    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("No matching binding found for '$key'.");
        }

        $resolver = $this->bindings[$key];

        // call_user_func allows you to invoke a function dynamically without knowing its name in advance.
        return call_user_func($resolver);


    }
}