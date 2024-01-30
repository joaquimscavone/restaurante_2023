<?php

namespace Controllers\Atendimento;
use Core\Controller;
use Core\Request;
use Core\Session;
use Core\View;
use Models\Atendimento;
use Models\Pedido;
use Models\Produto;

class Pedidos extends Controller{
   
    public function index($mesa){
        $view = new View('atendimentos/pedidos');
        $atendimento = new Atendimento();
        $atendimento = $atendimento->where('mesa','=',$mesa)->where('pagamento_data','is',null)->get();
        if($atendimento == false){
          
        }
        $produtos = new Produto();
        $produtos = $produtos->where('disponivel','=',1)->all();
        $view->show(['atendimento'=>$atendimento, 'produtos'=>$produtos, 'total_geral'=>0]);
    }

    public function addPedido(){
        $request = Request::getInstance();
        $produto = new Produto($request->produtos_id);
        $pedido = new Pedido();
        $pedido->atendimentos_id = $request->atendimentos_id;
        $pedido->quantidade = $request->quantidade;
        $pedido->valor_un = $produto->valor_un;
        $pedido->produtos_id = $produto->id;
        $pedido->save();
        $session = Session::getInstance();
        $session->AddFlashMessage('success','Pedido Adicionado');
        $this->redirect(self::class,'index',[$request->mesa]);
    }

 
}