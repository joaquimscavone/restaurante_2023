<?php

namespace Core;

class Model
{
    protected $connection;
    protected $table;
    private $wheres = [];
    protected $columns;
    protected $pk = 'id';//primary key
    private $data = [];

    private $storage = false;
    public function __construct($id = null){
        if(isset($id)){
            $this->load($id);
        }
    }


    public function __get($name){
        if(isset($this->data[$name])){
            return $this->data[$name];
        }
        return null;
    }
    public function __set($name,$value){
        $this->data[$name] = $value;
    }

    private function load($id){
        $this->where($this->pk,'=',$id);
        $stm = $this->select();
        $result = $stm->fetch(\PDO::FETCH_ASSOC);
        if($result){
            $this->data = $result;
            $this->storage = true;
        }
    }


    private function getConnection(){
        if(!isset($this->connection)){
            $this->connection = Connection::getConnection();
        }
        return $this->connection;
    }

    public function query($sql, $data = []){
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute($data);
        return $stm;
    }

    public function all(){
       $reuslt =  $this->select();
       $result =  $reuslt->fetchAll(\PDO::FETCH_CLASS, get_class(($this)));
       array_walk($result,function(&$obj){
        $obj->storage = true;
       });
       return $result;
    }

    public function get(){
       $reuslt =  $this->select();
       $result =  $reuslt->fetch(\PDO::FETCH_CLASS, get_class(($this)));
       $result->storage = true;
       return $result;

    }

    private function insert($data){
        $columns = array_keys($data);
        $sql = "INSERT INTO $this->table (".implode(', ',$columns).") VALUES (
            :".implode(', :',$columns)."
        );";
        $this->query($sql,$data);
        $this->storage = true;
        $pk = $this->pk;
        $this->data = $data;
        $this->$pk = $this->getLastInsertId();
        return $this->$pk;
    }

    public function getLastInsertId(){
        return $this->getConnection()->lastInsertId($this->table);
    }

    public function save($data = []){
        if(count($data)==0){
            $data = $this->data;
        }
        if($this->storage){
            $this->update($data);
        }else{
            $this->insert($data);
        }
        
    }
    private function update($data){
        $columns = array_keys($data);
        $sql = "UPDATE $this->table SET";
        $comma = '';
        foreach($data as $key => $value){
            $sql.="$comma $key = :$key";
            $comma = ',';
        }
        $pk = $this->pk;
        $this->where($this->pk,'=',$this->$pk);
        [$where,$dwhere] = $this->flushWhere();
        $sql.=" $where;";
        $data = array_merge($data,$dwhere);
        return $this->query($sql,$data);
    }


    public function delete(){
        $sql = "DELETE FROM $this->table";
        $pk = $this->pk;
        $this->where($this->pk,'=',$this->$pk);
        [$where,$data] = $this->flushWhere();
        $sql.=" $where;";
        $this->storage = false;
        return $this->query($sql,$data);

    }


    private function select()
    {
        $sql = "SELECT ".implode(',',$this->columns)." FROM $this->table";
        [$where,$data] = $this->flushWhere();
        $sql.=" $where;";
        return $this->query($sql,$data);
    
    }


    public function where($column,$omparassion_operator,$value){
        $this->addWhere($column,$omparassion_operator,$value);
        return $this;
    }   

    public function orWhere($column,$omparassion_operator,$value){
        $this->addWhere($column,$omparassion_operator,$value,'OR');
        return $this;
    }  

    //Montar o were e limpar os wheres das condição.
    private function flushWhere(){
        $sql = '';
        $data = [];
        if(count($this->wheres)){
            $w = array_shift($this->wheres);
            $sql = "WHERE {$w['column']} {$w['comparassion']} :p0";
            $data['p0'] = $w['value'];
        }
        foreach($this->wheres as $key => $w){
            $param = 'p'.($key+1);
            $sql.= " {$w['logic']} {$w['column']} {$w['comparassion']} :{$param}";
            $data[$param] = $w['value'];
        }

        return [$sql,$data];
    }

    private function addWhere($column,$comparassion_operator,$value,$logic_operator = 'AND'){
        $this->wheres[] = ['column'=>$column,
        'comparassion'=>$comparassion_operator,
        'value'=>$value,
        'logic'=>$logic_operator];
    }


}