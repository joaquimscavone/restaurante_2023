<?php

namespace Models;
use Core\Model;

class Usuario extends Model{
    protected $table = 'usuarios';
    protected $columns = ['cod_usuario','nome','email'];

    protected $pk = 'cod_usuario';

}