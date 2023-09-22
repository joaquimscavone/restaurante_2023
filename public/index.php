<?php

require_once '../app/application.php';


use Core\View;

$pg = 'pg1';
if(isset($_GET['pg'])){
    $pg = $_GET['pg'];
}

$pg = new View($pg,'main');
$pg->show();