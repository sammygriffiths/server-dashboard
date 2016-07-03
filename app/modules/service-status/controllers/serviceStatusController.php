<?php 

namespace Sammy\Server;

class ServiceStatusController extends CoreModuleController
{

    private $model;
    private $statuses;

    public function __construct() {
        parent::__construct();
        $this->model = new ServiceStatusModel;
        $this->statuses = $this->model->getStatuses();
    }

    public function render() {
        return $this->app['twig']->render('serviceStatus.html.twig', array(
            'statuses' => $this->statuses
        ));
    }

}
