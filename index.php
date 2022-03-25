<?php

session_start();

//appel de la bdd
require("config/Database.class.php");

//appel des controllers
require("controller/MainController.class.php");
require("controller/UserController.class.php");
require("controller/ProductController.class.php");

//instanciation des classes
$MainController = new MainController();
$UserController = new UserController();
$ProductController = new ProductController();

if (isset($_GET["page"])) {
    switch ($_GET['page']) {
        case 'home':
            $ProductController->ShowHomePage();
            break;
        case 'profil':
            $UserController->ProfilPage();
            break;
        case 'product':
            $ProductController->ProductPage();
            break;
        case 'inscription':
            $UserController->InscriptionPage();
            break;
        case 'destroy_session':
            $UserController->DestroySession();
            break;
    }
} else {
    $ProductController->ShowHomePage();
}
