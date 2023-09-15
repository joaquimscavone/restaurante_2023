<?php

namespace Core;

class View extends ViewElement{
    private $view;
    private $template;
    public function __construct($view, $template){
        $this->view = $view;
        $this->template = $template;
    }

    

    public function show(){
        $view = $this->view;
        require $this->template;
    }
}