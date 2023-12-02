<?php

namespace Controllers\Atendimento;
use Core\Controller;
use Core\View;
use Models\Atendimento;
use Models\Produto;

class Pedidos extends Controller{
   
    public function index($mesa){
        $view = new View('atendimentos/pedidos');
        $atendimento = new Atendimento();
        $atendimento = $atendimento->where('mesa','=',$mesa)->where('pagamento_data','is',null)->get();
        $view->show(['atendimento'=>$atendimento]);
    }

 
}