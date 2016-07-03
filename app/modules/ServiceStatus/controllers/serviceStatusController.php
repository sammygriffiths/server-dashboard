<?php 

namespace Griff\Server\ServiceStatus\Controllers;

class ServiceStatusController extends \Griff\Server\CoreModuleController
{

    // private $model;
    private $statuses;

    public function __construct() {
        parent::__construct();
        // $this->model = new \Griff\Server\ServiceStatus\Models\ServiceStatusModel;
        $this->statuses = $this->model->getStatuses();
    }

    public function render() {
        return $this->app['twig']->render('serviceStatus.html.twig', array(
            'statuses' => $this->statuses
        ));
    }

}
