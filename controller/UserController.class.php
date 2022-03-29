<?php

require_once("model/UserModel.class.php");

class UserController
{

    private $usercontroller;

    public function __construct()
    {
        $this->usermodel = new UserModel();
    }

    public function InscriptionPage()
    {
        $template = "inscription";
        include "view/layout.phtml";
    }

    public function ProfilPage()
    {
        $id = $_GET['id'];
        $product_user = $this->usermodel->UserProduct($id);
        $template = "profil";
        include "view/layout.phtml";
    }

    public function DestroySession()
    {
        session_destroy();
        header("location:index.php?page=home");
    }
}
