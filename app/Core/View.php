<?php

namespace Core;

class View extends ViewElement{
    private $view;
    private $template;
    public function __construct($view, $template = TEMPLATE_DEFAULT){
        $this->view = $view;
        $this->template = $template;
    }

    private function createStringRequireView($file){
        if(substr($file,-9,9) !== ".view.php"){
            $file.=".view.php";
        }
        return VIEWS_PATH."/".$file;
    }

    private function createStringRequireTemplate($file){
        if(substr($file,-13,13) !== ".template.php"){
            $file.=".template.php";
        }
        return TEMPLATES_PATH.'/'.$file;
    }

    public function show(){
        $view = $this->createStringRequireView($this->view);
        require $this->createStringRequireTemplate($this->template);
    }
}