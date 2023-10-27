<?php 


namespace Controllers\Usuarios;
use Core\Controller;
use Core\Request;
use Core\View;
use Models\Pessoa;
use Models\Usuario;

class Usuarios extends Controller{
    public function index(){
        $view = new View('usuarios/usuarios');
        $view->show();
    }

    public function novo(){
        $view = new View('usuarios/cadastrar');
        $view->setTemplate('title','Novo usuário');
        $view->show();
    }

    public function cadastrar(){
        $request = Request::getInstance();
        $data = $request->all();
        unset($data['url']);
        $pessoa = new Pessoa();
        $pessoa->save($data);
        $usuario = new Usuario();
        $usuario->login = $pessoa->cpf;
        $usuario->senha = password_hash($pessoa->cpf,PASSWORD_DEFAULT);
        $usuario->pessoas_id = $pessoa->id;
        $usuario->save();
        $this->redirect($this::class,'novo');
    }
}