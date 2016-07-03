<?php 

namespace Griff\Server;

class CoreModuleModel extends CoreModel
{
    protected $app;

    public function __construct() {
        global $app;
        parent::__construct();
        $this->app =& $app;
    }

}
