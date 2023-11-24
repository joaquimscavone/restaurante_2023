<?php

namespace Models;
use Core\Model;

class Atendimento extends Model{
    protected $table = 'atendimentos';

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
}