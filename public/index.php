<?php
use Core\Request;


require_once '../app/application.php';

Request::getInstance()->getAction()->run();