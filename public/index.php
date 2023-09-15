<?php

require_once '../app/application.php';


use Core\View;

$pg = 'pg1';
if(isset($_GET['pg'])){
    $pg = $_GET['pg'];
}

$pg = new View(VIEWS_PATH."/$pg.view.php",TEMPLATES_PATH.'/main.template.php');
$pg->show();