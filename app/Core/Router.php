<?php


namespace Core;

class Router{
    private static $routers = [];
    private $url;
    private $controller;
    private $method;
    private $parameters;


    private function __construct($url,$controller,$method = 'index'){
        $this->url = $url;
        $this->controller = $controller;
        $this->method = $method;
        $this->parameters = array_fill_keys($this->getRouterParameters($url),null);
        
    }

    public function getRouterParameters($url){
        if(preg_match_all("(\{[a-z0-9_\?]{1,}\})",$url,$m)){
            return preg_replace('(\{|\}|\?)','',$m[0]);
        }
        return [];
    }


    public static function add($url,$controller,$method = 'index'){
        if(substr($url,0,1)==='/'){
            $url = substr_replace($url,'',0, 1);
        }
        self::$routers[$url] = new Router($url,$controller,$method);
        return self::$routers[$url];
    }


    public static function getRouterByUrl($url){
        foreach(self::$routers as $router_url => $router){
            $expression = preg_replace("(\{[a-z0-9_]{1,}\})",'([a-zA-Z0-9_\-|\s]{1,})',$router_url);
            if(preg_match("#^($expression)*$#i",$url,$matches)===1){
                array_shift($matches);
                array_shift($matches);
                foreach($router->parameters as &$param){
                    $param = urldecode(array_shift($matches));
                }
                return $router;
            }
        }
        return false;
    }

    public static function getRouterByController($controller,$method = 'index', $parameters = []){
            foreach(self::$routers as $router_url =>$router){
                if($router->controller != $controller || $router->method != $method){
                    continue;
                }
                $matchs = preg_match_all("(\{[a-z0-9_]{1,}\})",$router_url);
                if($matchs==count($parameters)){
                    foreach($parameters as $key => $value){
                        $router->$key = $value;
                    }
                    return $router;
                }
            }
            return false;

    }

    public function getController(){
        return $this->controller;
    }

    public function getMethod(){
        return $this->method;
    }


    public function getParameters(){
        return $this->parameters;
    }
}
