<?php


namespace Models;
use Core\Model;

class Produto extends Model{
    protected $table = 'produtos';
    protected $columns = ['cod_produto'];
}