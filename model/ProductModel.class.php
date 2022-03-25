<?php

class ProductModel
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new Database;
        $this->bdd = $this->bdd->getBdd();
    }

    public function ListOfTea()
    {
        $query = $this->bdd->prepare("SELECT * FROM products WHERE type = 'tea'");
        $query->execute([]);
        $tea = $query->fetchAll();
        return $tea;
    }

    public function ListOfCofee()
    {
        $query = $this->bdd->prepare("SELECT * FROM products WHERE type = 'cofee'");
        $query->execute([]);
        $cofee = $query->fetchAll();
        return $cofee;
    }

    public function ProductInfo($id)
    {
        $query = $this->bdd->prepare("SELECT * FROM products JOIN users on products.id_vendor = users.id WHERE products.id = ?");
        $query->execute([$id]);
        $product = $query->fetch();
        return $product;
    }
}
