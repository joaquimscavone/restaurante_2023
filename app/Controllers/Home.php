<?php



namespace Controllers;

use Core\Controller as CoreController;
use Core\View;

class Home extends CoreController{
    public function index(){
        $view = new View('pg1');
        $view->title = 'Home';
        $view->show();
    }
}