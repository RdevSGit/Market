<?php

require_once("model/MainModel.class.php");

class MainController
{

    private $mainmodel;

    public function __construct()
    {
        $this->mainmodel = new MainModel();
    }


}
