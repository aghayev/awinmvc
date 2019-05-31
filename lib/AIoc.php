<?php

namespace Lib;

/**
 * Class AIoc Inversion of Control (IoC)
 *
 * @package Lib
 */
abstract class AIoc
{

    /**
     * Registry
     *
     * @var array
     */
    protected static $registry = array();

    /**
     * Registering (binding) to a container
     *
     * @param $name
     * @param Closure $resolve
     */
    public static function bind($name, \Closure $function)
    {
        static::$registry[$name] = $function;
    }

    /**
     * Resolving (making) from a container
     *
     * @param string $name
     * @return mixed
     */
    public static function make($name)
    {
        if ( static::registered($name) )
        {
            $name = static::$registry[$name];
            return $name();
        }

        throw new Exception('Name not registered');
    }

    /**
     * Already registered or not
     *
     * @param string $name
     * @return bool
     */
    public static function registered($name)
    {
        return array_key_exists($name, static::$registry);
    }

    /**
     * Abstract static method init(), needs impl. in concrete classes
     */
    abstract static protected function init();
}