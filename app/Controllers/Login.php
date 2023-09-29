<?php

namespace Controllers;
use Core\Controller;
use Core\View;

class Login extends Controller{
    public function index(){
        $view = new View('usuarios\login','blank');
        $view->show();
    }
}