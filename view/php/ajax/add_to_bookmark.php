<?php

include_once("../../../config/connexion/connexion.php");


$user_id = $_POST['user_id'];
$product_id = $_POST['product_id'];


$check = $bdd->prepare("SELECT * FROM bookmark WHERE user_id_bookmark = ? AND product_id_bookmark = ?");
$check->execute([$user_id, $product_id]);
$check_result = $check->rowCount();

if ($check_result == 0) {
    $add_to_bookmark = $bdd->prepare("INSERT INTO bookmark (user_id_bookmark , product_id_bookmark) VALUES (?,?)");
    $add_to_bookmark->execute([$user_id, $product_id]);
} else {
    $remove_from_bookmark = $bdd->prepare("DELETE FROM bookmark WHERE user_id_bookmark = ? AND product_id_bookmark = ?");
    $remove_from_bookmark->execute([$user_id, $product_id]);
}
