<?php 

namespace Griff\Server;

class CoreModuleController
{
    protected $app;

    public function __construct() {
        global $app;
        $this->app =& $app;
    }
}
