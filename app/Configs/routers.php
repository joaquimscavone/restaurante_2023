<?php
use Core\Router;

Router::add('',CONTROLLER_DEFAULT);
Router::add('atendimentos',Controllers\Atendimento\Pedidos::class);


Router::add('/login',Controllers\Login::class);
Router::add('/usuarios',Controllers\Usuarios\Usuarios::class);
Router::add('/usuarios/novo',Controllers\Usuarios\Usuarios::class,'novo');
Router::add('/usuarios/cadastrar',Controllers\Usuarios\Usuarios::class,'cadastrar');
Router::add('/login/recuperar_senha',Controllers\Login::class,'recuperarSneha');
