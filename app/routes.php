<?php
const DEFAULT_ROUTE = 'index';
const ROUTES = [
    'index' => 'PhotoController@main',
    'upload' => 'PhotoController@upload',
];

$route = $_REQUEST['route'] ?? DEFAULT_ROUTE;

if (!array_key_exists($route, ROUTES)) {
    $route = DEFAULT_ROUTE;
}

$c = explode('@', ROUTES[$route]);
$className = 'app\controllers\\' . $c[0];
$methodName = $c[1];

$init = new $className();
$init->$methodName();
