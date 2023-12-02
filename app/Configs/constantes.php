<?php 

defined('APPLICATION_PATH') || define('APPLICATION_PATH',realpath(__DIR__.'/../..'));
defined('APPLICATION_ENV') || define('APPLICATION_ENV','DEVELOPMENT');
defined('APP_PATH') || define('APP_PATH', APPLICATION_PATH.'/app');
defined('APP_PATH') || define('APP_PATH', APPLICATION_PATH.'/app');
defined('APPLICATION_URL') || define('APPLICATION_URL', 'http://localhost/restaurante_2023/public');
defined('MAIN_URL') || define('MAIN_URL', 'http://localhost/restaurante_2023/');
defined('COMPOSER_PATH') || define('COMPOSER_PATH',APPLICATION_PATH.'/vendor');
defined('COMPOSER_URL') || define('COMPOSER_URL',MAIN_URL.'/vendor');
defined('ADMINLTE_URL') || define('ADMINLTE_URL',COMPOSER_URL.'/almasaeed2010/adminlte');
defined('TEMPLATES_PATH') || define('TEMPLATES_PATH',APP_PATH.'/Templates');
defined('VIEWS_PATH') || define('VIEWS_PATH',APP_PATH.'/Views');
defined('TEMPLATE_DEFAULT') || define('TEMPLATE_DEFAULT','main');
defined('APPLICATION_SESSION') || define('APPLICATION_SESSION','Polar');
defined('CONFIGS_PATH') || define('CONFIGS_PATH',APP_PATH.'/Configs');


defined('CONTROLLER_DEFAULT') || define('CONTROLLER_DEFAULT',\Controllers\Home::class);