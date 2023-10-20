<?php



namespace Controllers;

use Core\Configs;
use Core\Connection;
use Core\Controller as CoreController;
use Core\Model;
use Core\View;
use Models\Produto;
use Models\Usuario;

class Home extends CoreController{
    public function index(){
         $view = new View('home');
         $view->title = 'Home';
         $view->show();
    
    }
}