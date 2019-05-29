<?php

namespace Lib;

abstract class AScript 
{

private $argv = [];

	public function __construct() 
	{
		$shortopts = "m:";
		$longopts  = array(
    		"merchant:",
		);

		$this->argv = getopt($shortopts, $longopts);
	}

	public function get($id) {
		return $this->argv[$id];
	}

	public function has($id) {
		return isset($this->argv[$id]);
	}

	public function count() {
		return count($this->argv);
	}

	abstract protected function run();
}

