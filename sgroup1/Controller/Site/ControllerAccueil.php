<?php


/** @noinspection PhpIncludeInspection */
require_once 'Controller/ControllerPersonalized.php';

class ControllerAccueil extends ControllerPersonalized
{

    public function __construct()
    {
    	
    }

    public function index() {
        $this->generateView();
    }
}