<?php

namespace Lib;

abstract class AObjectSingleton
{

    /**
     * Singleton instance
     *
     * @var
     */
    private static $instance;

    /**
     * AObjectSingleton constructor. No access to it
     */
    private function __construct() {}
    private function __clone() {}

    /**
     * Using of static keyword
     *
     * @return static
     */
    public static function getInstance() {

        if (empty(self::$instance)) {
            self::$instance = new static();
            self::$instance->init();
        }

        return self::$instance;
    }

    /**
     * Abstract method init(), needs impl. in concrete classes
     */
    abstract public function init();
}