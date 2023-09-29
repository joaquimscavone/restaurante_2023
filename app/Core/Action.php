<?php

namespace Core;

class Action{
    private $router;
    public function __construct($controller=null,$method='index',$paramns=[]){
        if($controller){
            $this->router = Router::getRouterByController($controller,$method,$paramns);
        }
    }


    public function run(){
        if($this->router){
            $controller = $this->router->getController();
            $controller = new $controller;
            $parameters = array_values($this->router->getParameters());
            call_user_func_array([
                $controller,
                $this->router->getMethod()
            ],$parameters);
            return;
        }

        if(defined('PAGE_404')){

        }
        die('ERRO 404 - PAGE NOT FOUND!');
    }

    public static function getActionByUrl($url){
        $action = new Action();
        $action->router = Router::getRouterByUrl($url);
        return $action;
    }
}