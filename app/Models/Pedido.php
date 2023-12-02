<?php

namespace Models;
use Core\Model;

class Pedido extends Model{
    protected $table = 'pedidos';
    private $produto;
    protected $columns = [
        'id',
        'atendimentos_id',
        'produtos_id',
        'quantidade',
        'valor_un',
        'situacao',
        'saida_data',
        'entrega_data',
        'criacao_data',
        'alteracao_data',
        'exclusao_data'
    ];

    public function getProduto(){
        if(!isset($this->produto)){
            $this->produto = new Produto($this->produtos_id);
        }
        return $this->produto;
    }

    protected function clear(){
        unset($this->produto);
    }
}