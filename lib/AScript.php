<?php

abstract class AScript 
{
	public function __construct() 
{
echo 'ascript constructor';
}

	abstract protected function run();
}

