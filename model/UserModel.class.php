<?php

class UserModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Database();
        $this->bdd = $this->bdd->getBdd();
    }
    public function UserInfo($îd){
        
    }
    public function UserProduct($id)
    {
        $query = $this->bdd->prepare("SELECT * FROM products WHERE id_vendor = ?");
        $query->execute([$id]);
        $product_user = $query->fetchAll();
        return $product_user;
    }
}
