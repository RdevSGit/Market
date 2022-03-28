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
        $query = $this->bdd->prepare("SELECT * FROM products WHERE type = 'tea' ORDER BY RAND()");
        $query->execute([]);
        $tea = $query->fetchAll();
        return $tea;
    }

    public function ListOfCofee()
    {
        $query = $this->bdd->prepare("SELECT * FROM products WHERE type = 'cofee' ORDER BY RAND()");
        $query->execute([]);
        $cofee = $query->fetchAll();
        return $cofee;
    }

    public function ProductInfo($id)
    {
        $query = $this->bdd->prepare("SELECT *, products.id as p_id FROM products JOIN users on products.id_vendor = users.id WHERE products.id = ?");
        $query->execute([$id]);
        $product = $query->fetch();
        return $product;
    }

    public function CheckBookmark($user , $id)
    {
        $query = $this->bdd->prepare("SELECT * FROM bookmark WHERE user_id_bookmark = ? AND product_id_bookmark = ?");
        $query->execute([$user, $id]);
        $bookmark = $query->rowCount();
        return $bookmark;
    }

    public function ListFav($id){
        $query = $this->bdd->prepare("SELECT *, products.id as p_id FROM products JOIN bookmark on products.id = bookmark.product_id_bookmark WHERE user_id_bookmark =? ");
        $query->execute([$id]);
        $bookmark = $query->fetchAll();
        return $bookmark;
    }   
}