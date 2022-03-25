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
        $id = $_GET['id'];
        $product = $this->productmodel->ProductInfo($id);
        $template = "product";
        include 'view/layout.phtml';
    }


    public function ShowHomePage()
    {
        $tea = $this->productmodel->ListOfTea();
        $cofee = $this->productmodel->ListOfCofee();
        $template = "home";
        include "view/layout.phtml";
    }
}
