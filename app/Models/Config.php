<?php


namespace Models;
use Core\Model;

class Config extends Model{
    protected $table = 'cofigs';
    protected $columns = ['id','name','value'];
}