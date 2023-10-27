<?php
use Core\Request;


require_once '../app/application.php';

var_dump(\Core\Router::getRouterByController(Controllers\Usuarios\Usuarios::class,'cadastrar')->getUrl());