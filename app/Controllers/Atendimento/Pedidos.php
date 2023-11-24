<?php

namespace Controllers\Atendimento;
use Core\Controller;
use Core\View;

class Pedidos extends Controller{
    public function index(){
        $view = new View('atendimentos/pedidos');
        $view->show();
    }
}