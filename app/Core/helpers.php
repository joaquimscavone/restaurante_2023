<?php


if (!function_exists('showMessagens')) {
    function showMessagens()
    {
        $session = \Core\Session::getInstance();
        $msgs = $session->FlushMessage();
        foreach ($msgs as $msg) {
            echo "toastr.{$msg['type']}('{$msg['msg']}')";
        }
    }
}
if (!function_exists('createDBConfigs')) {
    function createDBConfigs()
    {
        $configs = new Models\Config();
        foreach ($configs->all() as $config) {
            defined($config->name) || define($config->name, $config->value  );
        }

    }
}

if (!function_exists('assets')) {
    function assets($url)
    {
        return APPLICATION_URL."/public/assets/$url";
    }
}
if (!function_exists('url')) {
    function url($controller,$action = 'index',$parameters=[])
    {
        $router = Core\Router::getRouterByController($controller,$action,$parameters);
        return APPLICATION_URL."/public/".$router->getUrl();
        
    }
}
if (!function_exists('pre')) {
    function pre($var)
    {
        echo '<pre>';
        var_dump($var);
        echo "</pre><hr>";
    }
}