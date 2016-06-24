<?php 

namespace Sammy\Server;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class coreModel
{
	public $test;

    public function __construct() {
    	$this->test = 'test';
    }

}
