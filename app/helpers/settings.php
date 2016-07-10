<?php 

namespace Griff\Server;

class Settings
{

    private $settings;

    public function __construct($settingsFile){
        $this->settings = json_decode(file_get_contents($settingsFile));
    }

    public function all() {
        return isset($this->settings) ? $this->settings : null;
    }

    public function get($setting) {
        return isset($this->settings->$setting) ? $this->settings->$setting : null;
    }

    public function service($service, $setting) {
        if (isset($this->settings->services->$service->$setting)) {
            return $this->settings->services->$service->$setting;
        } elseif (null !== $this->get($setting)) {
            return $this->get($setting);
        } else {
            return null;
        }
    }
}
