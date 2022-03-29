<?php

require_once("model/ProductModel.class.php");

class ProductController
{
    private $productmodel;

    public function __construct()
    {
        $this->productmodel = new ProductModel();
    }

    public function ProductPage()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $product = $this->productmodel->ProductInfo($id);
            if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                $user = $_SESSION['id'];
                $bookmark = $this->productmodel->CheckBookmark($user, $id);
                $fav_book = $this->productmodel->CheckFav($id);
            }
            $template = "product";
        } else {
            $template = "error";
        }
        include 'view/layout.phtml';
    }

    public function ShowHomePage()
    {

        $tea = $this->productmodel->ListOfTea();
        $cofee = $this->productmodel->ListOfCofee();
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $bookmark = $this->productmodel->ListFav($id);
        }
        $template = "home";
        include "view/layout.phtml";
    }

    public function ErrorPage()
    {
        $template = "error";
        include "view/layout.phtml";
    }
}
