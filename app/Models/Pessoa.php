<?php


namespace Models;
use Core\Model;

class Pessoa extends Model{
    protected $table = 'pessoas';
    protected $columns = ['id','nome','cpf','rg','rg_expedidor','telefone','nacimento'];
}