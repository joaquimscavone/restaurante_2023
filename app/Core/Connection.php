<?php

namespace Core;

class Connection{
    private static $connection;
    
    private function __construct(){}

    public static function getConnection(){
        if(!isset(self::$connection)){
            $database = Configs::get('database');
            $dns = "{$database['driver']}:host={$database['host']};port={$database['port']};dbname={$database['database']}";
            try{
                $options = [];
                if($database['driver'] == 'mysql'){
                    $options = [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];
                }       
                $coon = new \PDO($dns,$database['user'],$database['password'],$options);
                APPLICATION_ENV === 'production' || $coon->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            }catch(\PDOException $e){
                throw new \Exception('Não foi possível se connectar a base de dados');
            }
            self::$connection = $coon;
        }
        return self::$connection;
    }

}