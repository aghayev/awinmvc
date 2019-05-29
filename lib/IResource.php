<?php

namespace Lib;

/**
 * Interface IResource
 *
 * @package Lib
 */
interface IResource
{
    /**
     * Abstract method load(), needs impl. in concrete classes
     */
    public function load($key);
}