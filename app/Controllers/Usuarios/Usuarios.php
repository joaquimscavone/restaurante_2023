<?php 


namespace Controllers\Usuarios;
use Core\Controller;
use Core\View;

class Usuarios extends Controller{
    public function index(){
        $view = new View('usuarios/usuarios');
        $view->show();
    }
}