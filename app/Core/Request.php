<?php

namespace Core;

class Request{
    private static $instance;
    private function __construct(){
        Session::getInstance();
    }

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new Request();
        }
        return self::$instance;
    }

    public function __get($name){
        return (array_key_exists($name,$_REQUEST)?$_REQUEST[$name]:null);
    }

    public function getAction(){
        return Action::getActionByUrl($this->url);
    }

    public function all(){
        return $_REQUEST;
    }
}


