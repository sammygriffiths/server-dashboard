<?php 

namespace Griff\Server;

class Modules
{
    public static function get() {
        global $app;

        $modules = array();

        foreach ($app->modules as $module => $enabled) {
            if ($enabled) {
                $moduleController = __namespace__.'\\'.$module.'\\Controllers\\'.$module.'Controller';
                $moduleController = new $moduleController;
                $modules[$module] = $moduleController->render();
            } else {
                $modules[$module] = null;
            }
        }

        return $modules;
    }
}
