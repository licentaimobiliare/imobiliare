<?php

$config['domain'] = NULL;
$config['folder'] = NULL;

$config['database']['host'] = 'localhost';
$config['database']['user'] = NULL;
$config['database']['password'] = NULL;
$config['database']['name'] = NULL;

$config['default_controller'] = 'home';
$config['default_action'] = 'index';

$config['site_track']=1;
$config['teren_track']=2;

// Include local config
if (file_exists(APP_PATH . 'config/config.local.php')) {
	@include_once APP_PATH . 'config/config.local.php';
}