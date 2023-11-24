<?php



namespace Controllers;

use Core\Configs;
use Core\Connection;
use Core\Controller as CoreController;
use Core\Model;
use Core\View;
use Models\Atendimento;
use Models\Config;
use Models\Produto;
use Models\Usuario;

class Home extends CoreController{
    public function index(){
         $atendimentos = new Atendimento();
         $atendimentos->where('pagamento_data','is',null);
         $atendimentos = $atendimentos->all();
         for($n=1; $n<=N_MESAS; $n++){
            $mesas[$n] = null;
         }
         foreach($atendimentos as $atendimento){
            $mesas[$atendimento->mesa] = $atendimento;
         }

         $view = new View('home');
         $view->title = 'Home';
         $view->show(['mesas'=>$mesas]);
    }
}