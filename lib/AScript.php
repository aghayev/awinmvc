<?php

namespace Lib;

/**
 * Class AScript
 *
 * @package Lib
 */
abstract class AScript 
{

/**
 * @var array
 */
private $argv = [];

    /**
     * AScript Constructor
     */
	public function __construct($shortopts)
	{
		$this->argv = getopt($shortopts);
	}

    /**
     * Get argument method
     *
     * @param string $key
     * @return mixed string|null
     */
	public function get($id) {
		return $this->argv[$id];
	}

    /**
     * Has argument method
     *
     * @param string $key
     * @return bool
     */
	public function has($key) {
		return isset($this->argv[$key]);
	}

    /**
     * Count method
     *
     * @return int
     */
	public function count() {
		return count($this->argv);
	}

    /**
     * Abstract method run(), needs impl. in concrete classes
     */
	abstract protected function run();
}

