<?php

namespace Core;

class View extends ViewElement{
    private $view;
    private $template;
    private $data = [];
    private $template_data = [];

    
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

    public function __set($name,$value){
        $this->data[$name] = $value;
    }

    private function createStringRequireTemplate($file){
        if(substr($file,-13,13) !== ".template.php"){
            $file.=".template.php";
        }
        return TEMPLATES_PATH.'/'.$file;
    }

    public function setTemplate($name,$value){
        $this->template_data[$name] = $value;
    }

    public function show(array $data = []){
        $this->data = array_merge($this->data,$data);
        $getTemplate = function ($name, $default = ''){
            if(isset($this->template_data[$name])){
                return $this->template_data[$name];
            }
            return $default;
        };

        $get = function($name,$default = ''){
            if(isset($this->data[$name])){
                return $this->data[$name];
            }
            return $default;
        };
        extract($this->data);
        $view = $this->createStringRequireView($this->view);
        require $this->createStringRequireTemplate($this->template);
    }



}