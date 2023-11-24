<?php


namespace Core;

class Session{
    protected $session_key = 'SESSION';
    private $session;

    private static $instance;
    private function __construct(){
        session_name(APPLICATION_SESSION);
        session_start();
        if(isset($this->session_key)){
            if(array_key_exists($this->session_key,$_SESSION)){
                $_SESSION[$this->session_key] = array();
            }
            $this->session = &$_SESSION[$this->session_key];
        }
        if(!array_key_exists('msgs',$_SESSION)){
            $_SESSION['msgs'] = [];
        }
    }

    public function __get($name){
        if(array_key_exists($name,$this->session)){
            return $this->session[$name];
        }
        return null;
    }

    public function __set($name,$value){
        $this->session[$name] = $value;
    }

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new Session();
        }
        return self::$instance;
    }

    public function registerUser($user){

    }

    public function AddFlashMessage($tipo,$msg){
            $msgs = &$_SESSION['msgs'];
            array_push($msgs,['type'=>$tipo,'msg'=>$msg]);
    }

    public function FlushMessage(){
        $msgs = $_SESSION['msgs'];
        $_SESSION['msgs'] = array();
        return $msgs;
        
    }

}