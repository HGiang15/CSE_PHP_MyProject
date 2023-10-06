<?php
require_once ('../app/config/config.php');
require_once APP_ROOT.'/app/libs/DBConnection.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'category';
$action     = isset($_GET['action']) ? $_GET['action'] : 'index';

$controller = ucfirst($controller);
$controller = $controller."Controller";
$path = APP_ROOT.'/app/controllers/'.$controller.'.php';

if(!file_exists($path)) {
    die("Request not found. Check your path controller");
}

include $path;

$myController = new $controller();

if (method_exists($myController, $action)) {
    $myController->$action();
} else {
    echo "$action does not exist in $controller class";
}

?>