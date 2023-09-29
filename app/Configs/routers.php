<?php
use Core\Router;

Router::add('',CONTROLLER_DEFAULT);
Router::add('/login',Controllers\Login::class);
Router::add('/usuarios',Controllers\Usuarios\Usuarios::class);
