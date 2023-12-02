<?php

namespace Models;
use Core\Model;

class Atendimento extends Model{
    protected $table = 'atendimentos';
    protected $pedidos;
    protected $columns = [
        'id',
        'pessoas_id',
        'mesa',
        'pagamento_data',
        'valor_desconto',
        'taxa_servico',
        'criacao_data',
        'alteracao_data',
        'exclusao_data'
    ];

    public function getPedidos(){
      if(!isset($this->pedidos)){
        $pedidos = new Pedido;
        $this->pedidos = $pedidos->where('atendimentos_id','=',$this->id)->all();
      }
      return $this->pedidos;

    }
}