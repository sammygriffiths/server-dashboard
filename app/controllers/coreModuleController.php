<?php 

namespace Griff\Server;

class CoreModuleController extends CoreController
{
    protected $app;

    public function __construct() {
        global $app;
        parent::__construct();
        $this->app =& $app;
    }
}
