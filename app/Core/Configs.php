<?php

namespace Core;
/**
 * 
 */

 class Configs{
    private static $configs = [];
    private function __construct(){}
    public static function get($key){
        if(is_string($key)){
            $key = explode(".", $key);
        }
        if(!array_key_exists($key[0],self::$configs)){
            $filename = $key[0];
            self::$configs[$filename] = include CONFIGS_PATH."/$filename.php";
        }
        $lista = self::$configs;
        foreach ($key as $value) {
            if(isset($lista[$value])){
                $lista = $lista[$value];
            }else{
                $lista = null;
            }
        }
        return $lista;
    }
 }