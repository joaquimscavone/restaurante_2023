<?php

namespace Controllers;
use Core\Controller;
use Core\View;

class Login extends Controller{
    public function index(){
        $view = new View('usuarios\login','blank');
        $view->show();
    }

    public function recuperarSneha(){
        $view = new View('usuarios/redefinir_senha','blank');
        $view->title = 'Redefinir Senha';
        $view->show();
    }
}