<?php
// Session
session_start();
 //var_dump($_SESSION);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
// Main app path
define('APP_PATH', dirname(realpath(__FILE__)) . '/app/');

//define global variable from seesion
if(!empty($_SESSION['user'])) $GLOBALS['user']=$_SESSION['user'];
$GLOBALS['id_tip_imobile_apartament']=array(4,5);
// Include config
require_once APP_PATH . 'config/config.php';

define('APP_URL', $config['domain'] . $config['folder']);


// define constant
define('DEFAULT_PAGER',10);

// Setup auto-loader
spl_autoload_register("auto_loader");
function auto_loader($class) {
    if (false !== strpos($class, '_')) {
        $tokens = explode('_', $class);
        if (file_exists(APP_PATH . implode('/', $tokens) . '.php')) {
            include APP_PATH . implode('/', $tokens) . '.php';
        }
    }
}

// Parse URL and determine current controller and action.
$url = $_SERVER['REQUEST_URI'];
if (0 === strpos($url, $config['folder'])) {
	$url = substr($url, strlen($config['folder']));
}
$rev = array_reverse(explode('?', $url));
$url = array_pop($rev);	
$url = trim($url, '/');
$tokens = $url ? explode('/', $url) : array();

// Determin controller and action
$controller = $config['default_controller'];
$action = $config['default_action'];

// First argument in the URL, if exists, defines the controller
if (count($tokens) >= 1) {
	$controller = $tokens[0];
	$tokens = (count($tokens) > 1) ? array_slice($tokens, 1) : array();
}

// Second argument in the URL, if exists, defines the action
if (count($tokens) >= 1) {
	$action = $tokens[0];
	$tokens = (count($tokens) > 1) ? array_slice($tokens, 1) : array();
}

// Compiles controller class name
$controller_class = 'controller_' . $controller;

// Compiles action method name
$action_method = 'action_' . $action;

// Verifies if the controller class exists, if doesn't exist then the URL is invalid
if (!class_exists($controller_class)) {
	$controller = '404';
	$controller_class = 'controller_404';
	$action = 'index';
	$action_method = 'action_index';
}

// Instantiates the controller class
$controller_instance = new $controller_class;

// Verifies if the action method exists, if doesn't exist then the URL is invalid
if (!method_exists($controller_instance, $action_method)) {
	$controller = '404';
	$controller_class = 'controller_404';
	$controller_instance = new $controller_class;
	$action = 'index';
	$action_method = 'action_index';
}

// Go!
$controller_instance->$action_method($tokens);
