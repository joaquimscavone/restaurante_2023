<?php 

defined('APPLICATION_PATH') || define('APPLICATION_PATH',realpath(__DIR__.'/../..'));
defined('APPLICATION_NAME') || define('APPLICATION_NAME','Polar');
defined('APP_PATH') || define('APP_PATH', APPLICATION_PATH.'/app');
defined('APPLICATION_URL') || define('APPLICATION_URL', 'http://localhost/projeto');
defined('COMPOSER_PATH') || define('COMPOSER_PATH',APPLICATION_PATH.'/vendor');
defined('COMPOSER_URL') || define('COMPOSER_URL',APPLICATION_URL.'/vendor');
defined('ADMINLTE_URL') || define('ADMINLTE_URL',COMPOSER_URL.'/almasaeed2010/adminlte');
defined('TEMPLATES_PATH') || define('TEMPLATES_PATH',APP_PATH.'/Templates');
defined('VIEWS_PATH') || define('VIEWS_PATH',APP_PATH.'/Views');
defined('TEMPLATE_DEFAULT') || define('TEMPLATE_DEFAULT','main');