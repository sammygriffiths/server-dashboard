<?php 

namespace Griff\Server;

class Modules
{
    public static function get() {
        global $app;

        $modules = array();

        foreach ($app->getEnabledModules() as $module) {
            $moduleController = __namespace__.'\\'.$module.'\\Controllers\\'.$module.'Controller';
            $moduleController = new $moduleController;
            $modules[$module] = $moduleController->render();
        }

        return $modules;
    }
}
