<?php 

namespace Sammy\Server;

class CoreModuleModel
{
    protected $app;

    public function __construct() {
        global $app;
        $this->app =& $app;
    }

}
