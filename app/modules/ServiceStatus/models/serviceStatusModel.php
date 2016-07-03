<?php 

namespace Griff\Server\ServiceStatus\Models;

use JJG\Ping;

class ServiceStatusModel extends \Griff\Server\CoreModuleModel
{

    private $ping;

    public function __construct() {
        parent::__construct();
        $this->ping = new Ping($this->app->settings->get('ip'));
    }

    public function checkStatus($service) {
        $serviceHost = (empty($this->app->settings->service($service, 'ip'))) ? $this->app->settings->get('ip') : $this->app->settings->service($service, 'ip');
        $servicePort = $this->app->settings->service($service, 'port');

        $this->ping->setHost($serviceHost);
        $this->ping->setPort($servicePort);

        $result = $this->ping->ping('fsockopen');

        return (false === $result) ? false : true;
    }

    public function getStatuses() {
        $serviceSettings = $this->app->settings->all()->services;
        $statuses = array();

        foreach ($serviceSettings as $service => $settings) {
            $statuses[$service] = $this->checkStatus($service);
        }

        return $statuses;
    }
}
