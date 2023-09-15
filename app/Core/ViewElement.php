<?php

namespace Core;

//gestor de objetos gráficos do nosso site
use Core\Interfaces\ViewElement as ViewInterface;

class ViewElement implements ViewInterface{
    private $view;

    public function __construct(String $view){
        $this->view = $view;
    }
    public function show(){
        require $this->view;
    }
}