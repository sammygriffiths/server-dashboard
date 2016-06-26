<?php 

namespace Sammy\Server;

class Settings
{

    private $settings;

    public function __construct($settingsFile){
        $this->settings = json_decode(file_get_contents($settingsFile));
    }

    public function all() {
        return $this->settings;
    }

    public function get($setting) {
        return $this->settings->$setting;
    }

    public function service($service, $setting) {
        return $this->settings->services->$service->$setting;
    }
}
