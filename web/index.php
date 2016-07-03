<?php

require_once __DIR__.'/../app/config/bootstrap.php';

$app->get('/', 'Griff\Server\DashboardController::index');

$app->run();
