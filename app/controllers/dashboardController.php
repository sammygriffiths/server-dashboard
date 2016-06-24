<?php 

namespace Sammy\Server;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends CoreController
{
    public $model;

    public function index() {
        $this->model = new DashboardModel;
        return $this->model->test;
    }

}
