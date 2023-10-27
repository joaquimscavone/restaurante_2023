<?php

namespace Core;


class Controller{

    public function redirect($controller,$method='index',$parameters=[]){
        (new Action($controller,$method,$parameters))->redirect();
    }
}