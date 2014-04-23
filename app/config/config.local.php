<?php

$config['domain'] = 'http://imobile.com';
$config['folder'] = '/index.php';

$config['database']['host'] = '127.0.0.1';
$config['database']['user'] = 'root';
$config['database']['password'] = '';
$config['database']['name'] = 'imobilie_schema';

$config['default_controller'] = 'home';
$config['default_action'] = 'index';

// Include local config
if (file_exists(APP_PATH . 'config/config.local.php')) {
	@include_once APP_PATH . 'config/config.local.php';
}
